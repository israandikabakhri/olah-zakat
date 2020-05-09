<?php include('template/top.php') ?>
    

            <?php
                $id = $_SESSION['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
                $d  = mysqli_fetch_array($dt);
            ?>

<link rel="stylesheet" type="text/css" href="assets/datepicker/bootstrap-datetimepicker.min.css">

<form action="controller.php?page=penyetoran&action=insert" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">Tambah Data Penerimaan ZIS</h4>

                        <hr>

                        <input type="hidden" name="set_beras_muzakki" class="balance" value="<?php echo $d['set_beras_muzakki']; ?>" id="c1">

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Tanggal Penerimaan
                                        <input type="date" class="form-control tanggal" name="tgl" placeholder="Tanggal Penerimaan.." data-link-format="yyyy-mm-dd" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Nama Muzakki
                                        <input type="text" class="form-control" name="nama_muzakki" placeholder="nama Muzakki.." required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Alamat
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat.." required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Jumlah Jiwa (Orang) <i>*Termasuk Kepala Keluarga</i>
                                        <input type="number" class="form-control balance" name="jumlah_jiwa" placeholder="Jumlah Jiwa.." required onkeypress="return onlyNumbers();" value="0" min="0" id="c2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Harga Beras Yang Dimakan Per Liter (Rp)
                                        <input type="number" class="form-control balance" name="harga_beras_dimakan" placeholder="Harga Beras Yang Dimakan Per Liter.." required onkeypress="return onlyNumbers();" value="0" min="0" id="c3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Total Jumlah Zakat Beras (Liter)
                                        <input type="number" class="form-control balance" name="zakat_fitrah_beras" placeholder="Total Jumlah Zakat Beras.." required onkeypress="return onlyNumbers();" value="" min="0" id="c4">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Total Jumlah Zakat Uang (Rp)
                                        <input type="number" class="form-control balance" name="zakat_fitrah_uang" placeholder="Total Jumlah Zakat Uang.." required onkeypress="return onlyNumbers();" value="" min="0" id="c5">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Total Jumlah Zakat Mal (Rp)
                                        <input type="number" class="form-control" name="zakat_mal" placeholder="Total Jumlah Zakat Mal.." required onkeypress="return onlyNumbers();" value="0" min="0">
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
                                        <input type="number" class="form-control" name="infaq_sedekah" placeholder="Total Jumlah Infaq/Sedekah.." required onkeypress="return onlyNumbers();" value="0" min="0" id="infaq_sedekah">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        Arah Infaq/Sedekah
                                        <select class="form-control" name="arah_infaqsedekah" id="arah_infaqsedekah">
                                            <option value="">--- PILIH ---</option>
                                            <?php
                                                $dt = mysqli_query($mysqli, "SELECT * FROM ref_arah_infaqsedeqah");
                                                while($df = mysqli_fetch_array($dt)){
                                            ?>
                                            <option value="<?php echo $df['nama_penerima'] ?>"><?php echo $df['nama_penerima'] ?></option>
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
                                        <input type="number" class="form-control" name="fidyah" placeholder="Total Jumlah Fidyah.." required onkeypress="return onlyNumbers();" value="0" min="0">
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

                          // untuk form infaq
                          $('#infaq_sedekah').on('change', function (e) {
                             let vall = $('#infaq_sedekah').val();
                             if(vall > 0){
                                $('#arah_infaqsedekah').attr('required', true);
                             }else{ $('#arah_infaqsedekah').attr('required', false);}
                          });

                          //untuk validasi keseimbanngan zakat fitrah
                          
                          $('.balance').on('change', function () {
                              var c1 = $('#c1').val();
                              var c2 = $('#c2').val();
                              var c3 = $('#c3').val();
                              var c4 = $('#c4').val();
                              var c5 = $('#c5').val();

                              //alert('c1='+c1+'| c2='+c2+'| c3='+c3)
                              if(c1 > 0 && c2 > 0 && c3 > 0){
                                
                                if(c4 == 0 || c4 == null){ var beraspembagi = c1*c2; var allowc4 = 1; }
                                else if(c4 > 0){ var beraspembagi = c4; var allowc4 = 0; }
                                
                                if(c5 == 0 || c5 == null){ var uangpembagi = c1*c3*c2; var allowc5 = 1; }
                                else if(c5 > 0){ var uangpembagi = c5; var allowc5 = 0; }

                                var beras = (c1*c2)/beraspembagi;
                                var uang  = (c1*c3*c2)/uangpembagi;  
                                
                                if(allowc4 == 1){beras == uang}
                                else if(allowc5 == 1){uang == beras}

                                //alert(beras+' && '+uang);  

                                if(beras != uang){
                                    //if(c4 > 0 || c5 > 0){
                                        alert('Nilai Zakat Fitrah Tidak Seimbang!');
                                        $('#simpan').prop('disabled', true);  
                                    //}
                                }else{
                                    $('#simpan').prop('disabled', false); 
                                }
                              }

                          });


                        </script>


                        <div class="mbr-section-text">

            

                            <div class="row">
                                <div class="col-lg-12 text-xs-right">
                                    <a class="btn btn-lg btn-info-outline" href="penyetoran.php"><span class="fa fa-backward"></span> KEMBALI </a>
                                    <button type="submit" name="simpan" class="btn btn-lg btn-primary" id="simpan">Simpan&nbsp;<span class="fa fa-save"></span></button>
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