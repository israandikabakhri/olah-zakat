<?php include('template/top.php') ?>
    

            <?php
                $id = $_GET['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_pengeluaran_panitia WHERE id = $id");
                $d  = mysqli_fetch_array($dt);

                // Mencegah User Akses Bukan Haknya
                $dx = mysqli_query($mysqli, "SELECT COUNT(*) as tot FROM tb_pengeluaran_panitia WHERE id = $id AND  id_user = $_SESSION[id]");
                $dv  = mysqli_fetch_array($dx);

                if($dv['tot'] == 0){
                    echo '<script language="javascript"> alert("Anda Tidak Boleh Mengakses Data Ini!"); window.location.href = "penyetoran.php" </script>';
                }
                
            ?>

<link rel="stylesheet" type="text/css" href="assets/datepicker/bootstrap-datetimepicker.min.css">

<form action="controller.php?page=pengeluaran_panitia&action=update" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">EDIT PENGELUARAN PANITIA</h4>

                        <hr>

                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Uraian
                                        <input type="text" class="form-control" name="uraian" placeholder="Uraian.." required value="<?php echo $d['uraian']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Tanggal
                                        <input type="date" class="form-control tanggal" name="tgl" placeholder="Tanggal.." data-link-format="yyyy-mm-dd" required value="<?php echo $d['tgl']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Jumlah
                                        <input type="number" onkeypress="return onlyNumbers();" class="form-control" name="jumlah" placeholder="Jumlah.." required min="0" value="<?php echo $d['jumlah']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Satuan Barang
                                        <input type="text" class="form-control" name="satuan" placeholder="Satuan Barang.." required value="<?php echo $d['satuan']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Harga Satuan
                                        <input type="number" onkeypress="return onlyNumbers();" class="form-control" name="harga_satuan" placeholder="Harga Satuan.." required min="0" value="<?php echo $d['harga_satuan']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Sumber Pengeluaran
                                        <select class="form-control" name="sumber_pengeluaran">
                                            <option value="">--- PILIH ---</option>
                                            <option value="ZAKAT FITRAH UANG" <?php if($d['sumber_pengeluaran']=="ZAKAT FITRAH UANG"){echo'selected';} ?> >ZAKAT FITRAH UANG</option>
                                            <option value="ZAKAT MAAL" <?php if($d['sumber_pengeluaran']=="ZAKAT MAAL"){echo'selected';} ?> >ZAKAT MAAL</option>
                                            <option value="INFAQ/SEDEKAH (YANG KE MASJID)"  <?php if($d['sumber_pengeluaran']=="INFAQ/SEDEKAH (YANG KE MASJID)"){echo'selected';} ?> >INFAQ/SEDEKAH (YANG KE MASJID)</option>
                                            <option value="KAS MASJID" <?php if($d['sumber_pengeluaran']=="KAS MASJID"){echo'selected';} ?> >KAS MASJID</option>
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

            

                            <div class="row">
                                <div class="col-lg-12 text-xs-right">
                                    <a class="btn btn-lg btn-info-outline" href="pengeluaran_panitia.php"><span class="fa fa-backward"></span> KEMBALI </a>
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
<script src="assets/datepicker/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">


    $('.tanggal').datetimepicker({
         Default:false,
         language:  'fr',
         viewMode: 'months',
         todayBtn:  1,
         autoclose: 1,
         todayHighlight: 1,
         startView: 4,
         minView: 2,
         forceParse: 0,
        format: 'yyyy-mm-dd'
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