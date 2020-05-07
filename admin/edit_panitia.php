<?php include('template/top.php') ?>
    


            <?php
                $id = $_GET['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_panitia_zis WHERE id = $id");
                $d  = mysqli_fetch_array($dt);

                // Mencegah User Akses Bukan Haknya
                $dt = mysqli_query($mysqli, "SELECT COUNT(*) as tot FROM tb_panitia_zis WHERE id = $id AND  id_user = $_SESSION[id]");
                $d  = mysqli_fetch_array($dt);

                if($d['tot'] == 0){
                    echo '<script language="javascript"> alert("Anda Tidak Boleh Mengakses Data Ini!"); window.location.href = "penyetoran.php" </script>';
                }
                
            ?>


<form action="controller.php?page=panitia&action=update" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">EDIT PANITIA</h4>

                        <hr>

                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Nama Panitia
                                        <input type="text" class="form-control" name="nama" placeholder="nama Panitia.." value="<?php echo $d['nama']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Jabatan
                                        <select class="form-control" name="jabatan" required>
                                            <option>--- PILIH JABATAN ---</option>
                                            <?php
                                                $dt = mysqli_query($mysqli, "SELECT * FROM ref_jabatan");
                                                while($df = mysqli_fetch_array($dt)){
                                            ?>
                                            <option value="<?php echo $df['nama_jabatan'] ?>" <?php if($d['jabatan']==$df['nama_jabatan']){echo'selected';} ?>><?php echo $df['nama_jabatan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Set Ttd #1
                                        <select class="form-control" name="set_ttd1" required>
                                            <option value="YA"    <?php if($d['set_ttd1']=="YA"){echo'selected';} ?>>YA</option>
                                            <option value="TIDAK" <?php if($d['set_ttd1']=="TIDAK"){echo'selected';} ?>>TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Set Ttd #2
                                        <select class="form-control" name="set_ttd2" required>
                                            <option value="YA"    <?php if($d['set_ttd2']=="YA"){echo'selected';} ?>>YA</option>
                                            <option value="TIDAK" <?php if($d['set_ttd2']=="TIDAK"){echo'selected';} ?>>TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                          function onlyNumbers(evt) {
                            var e = event || evt;
                            var charCode = e.which || e.keyCode;

                            if(charCode > 31 && (charCode < 48 || charCode > 57))
                              return false;
                              return true;

                          }
                        </script>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Intensif
                                        <input type="number" onkeypress="return onlyNumbers();" class="form-control" name="intensif" placeholder="Intensif Panitia Zakat.." value="<?php echo $d['intensif']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">

            

                            <div class="row">
                                <div class="col-lg-12 text-xs-right">
                                    <a class="btn btn-lg btn-info-outline" href="panitia.php"><span class="fa fa-backward"></span> KEMBALI </a>
                                    <button type="submit" name="simpan" class="btn btn-lg btn-primary">Simpan&nbsp;<span class="fa fa-save"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    





                </div>
            </div>
        </div>
    </section>
</form>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $(function () {
      $("#datepicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true
      });
    });

    $(this).ready(function(){
       check_radio(); 
        $('#input_2').datepicker({
            dateFormat: "d-m-yy"
        });
        // mengambil data sebelum, sesudah, dan cover
        // load_pendukung();
    });
    $(document).on('change', 'input[name=input_13]', function(event) {
        event.preventDefault();
        check_radio();
    });
    function check_radio() {
        if (typeof $("input[name=input_13]:checked").val() === "undefined") {
            $(".group-check").hide();
        } else {
            if ($("input[name=input_13]:checked").val()==="Ya") {$(".group-check").show(); } 
            else if ($("input[name=input_13]:checked").val()==="Tidak") {$(".group-check").hide(); }
            else {$(".group-check").hide();}
        }
    }
    function simpan_proposal(){
        var formData = new FormData($('#form_proposal')[0]);
        $.ajax({
            type: 'POST',
            url: 'https://sinovik.menpan.go.id/index.php/simpan_proposal',
            async: 'true',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                    }
                    return myXhr;
                },
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $('#dialog_loading').modal('show');
            },
            error: function(E) {
                $('#dialog_loading').modal('hide');
                show_failed_alert();
            },
            success: function(S) {
                // console.log(S);
                $('#dialog_loading').modal('hide');
                if(S.update_msg!==0) {
                    show_success_alert();
                }
                else{
                    show_warning_alert();
                }
                setTimeout(function(){ window.location = window.location.pathname; }, 1300);
            }
        });
    }
    function simpan_pendukung(){
        var formData = new FormData($('#form_proposal')[0]);
        $.ajax({
            type: 'POST',
            url: 'https://sinovik.menpan.go.id/index.php/upload_pendukung_proposal',
            async: 'true',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                    }
                    return myXhr;
                },
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $('#dialog_loading').modal('show');
            },
            error: function(E) {
                show_failed_alert();
            },
            success: function(S) {
                console.log(S);
                $('#dialog_loading').modal('hide');
                
                if(S.support_msg!=="0") {
                    load_pendukung();
                    $('#file_2').val('');
                    show_success_alert();
                }
                else{
                    show_failed_alert();
                }
            }
        });
    }
    function load_pendukung(){
        $.ajax({
            type: 'POST',
            url: 'https://sinovik.menpan.go.id/index.php/data_pendukung',
            data: { input_0 : $('#input_0').val() },
            dataType: 'html',
            success: function(S){
                $('#data-pendukung tbody:last').empty().append(S);
            }
        });
    }
    function hapus_pendukung(id){
        if(confirm('Anda ingin menghapus pendukung ini?')) {
            $.ajax({
                type: 'POST',
                url: 'https://sinovik.menpan.go.id/index.php/hapus_pendukung',
                data: { id: id },
                dataType: 'html',
                success: function(S){
                    load_pendukung();
                }
            });
        }
    }
</script>

<?php include('template/bottom.php'); ?>