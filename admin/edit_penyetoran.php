<?php include('template/top.php') ?>
    



            <?php
                $id = $_GET['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE id = $id");
                $d  = mysqli_fetch_array($dt);

                // Mencegah User Akses Bukan Haknya
                $dx = mysqli_query($mysqli, "SELECT COUNT(*) as tot FROM tb_setoran_zis WHERE id = $id AND  id_user = $_SESSION[id]");
                $dv  = mysqli_fetch_array($dx);

                if($dv['tot'] == 0){
                    echo '<script language="javascript"> alert("Anda Tidak Boleh Mengakses Data Ini!"); window.location.href = "penyetoran.php" </script>';
                }
            ?>

<link rel="stylesheet" type="text/css" href="assets/datepicker/bootstrap-datetimepicker.min.css">



<form action="controller.php?page=penyetoran&action=update" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">Edit Data Penerimaan ZIS</h4>

                        <hr>
                        <b>INFO:</b> <b>Data Jumlah Jiwa</b> Dan <b>Harga Beras Yang Dimakan</b> Sudah Tidak Bisa Diubah. 
                        <br><br>
                        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Tanggal Penerimaan
                                        <input type="date" class="form-control tanggal" name="tgl" placeholder="Tanggal Penerimaan.." required value="<?php echo $d['tgl'] ?>" data-link-format="yyyy-mm-dd" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Nama Muzakki
                                        <input type="text" class="form-control" name="nama_muzakki" placeholder="nama Muzakki.." required value="<?php echo $d['nama_muzakki'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Alamat
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat.." required value="<?php echo $d['alamat'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Jumlah Jiwa (Orang) <i>*Termasuk Kepala Keluarga</i>
                                        <input type="number" class="form-control" name="jumlah_jiwa" placeholder="Jumlah Jiwa.." required onkeypress="return onlyNumbers();" value="<?php echo $d['jumlah_jiwa'] ?>" min="0" readonly style="background-color: #c6c6c6;">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Harga Beras Yang Dimakan Per Liter (Rp)
                                        <input type="number" class="form-control" name="harga_beras_dimakan" placeholder="Harga Beras Yang Dimakan Per Liter.." required onkeypress="return onlyNumbers();" value="<?php echo $d['harga_beras_dimakan'] ?>" min="0" readonly  style="background-color: #c6c6c6;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="zakat_fitrah_beras" value="<?php echo $d['zakat_fitrah_beras'] ?>">
                        <input type="hidden" name="zakat_fitrah_uang" value="<?php echo $d['zakat_fitrah_uang'] ?>">


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Total Jumlah Zakat Mal (Rp)
                                        <input type="number" class="form-control" name="zakat_mal" placeholder="Total Jumlah Zakat Mal.." required onkeypress="return onlyNumbers();" value="<?php echo $d['zakat_mal'] ?>" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- 
                        <div class="mbr-section-text">
                            <div class='row'>
                            </div>
                        </div> -->

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        Total Jumlah Infaq/Sedekah (Rp)
                                        <input type="number" class="form-control" name="infaq_sedekah" placeholder="Total Jumlah Infaq/Sedekah.." required onkeypress="return onlyNumbers();" value="<?php echo $d['infaq_sedekah'] ?>" min="0">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        Arah Infaq/Sedekah
                                        <select class="form-control" name="arah_infaqsedekah">
                                            <option value="">--- PILIH ---</option>
                                            <?php
                                                $dt = mysqli_query($mysqli, "SELECT * FROM ref_arah_infaqsedeqah");
                                                while($df = mysqli_fetch_array($dt)){
                                            ?>
                                            <option value="<?php echo $df['nama_penerima'] ?>" <?php if($d['arah_infaqsedekah']==$df['nama_penerima']){echo'selected';} ?>><?php echo $df['nama_penerima'] ?></option>
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
                                        Total Jumlah Fidyah (Rp)
                                        <input type="number" class="form-control" name="fidyah" placeholder="Total Jumlah Fidyah.." required onkeypress="return onlyNumbers();" value="<?php echo $d['fidyah'] ?>" min="0">
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
                                    <a class="btn btn-lg btn-info-outline" href="penyetoran.php"><span class="fa fa-backward"></span> KEMBALI </a>
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