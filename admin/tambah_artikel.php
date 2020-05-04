<?php include('template/top.php') ?>
    

    <?php 
          $cek = mysqli_query($mysqli, "SELECT * FROM tb_profile_aplikasi WHERE id = 1");
          $data = mysqli_fetch_array($cek);
    ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


<script src="https://sinovik.menpan.go.id/library/ckeditor/ckeditor.js"></script>


<form action="controller.php?page=artikel&action=insert" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">TAMBAH ARTIKEL</h4>

                        <hr>



                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="judul" placeholder="Judul Artikel.." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>



                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        Foto Utama Artikel:
                                        <input type="file" class="form-control" name="foto" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>

                        <div class="mbr-section-text">

                            <div class="form-group">

                            <textarea name="content" id="input_1" required></textarea>

                            </div>
                            <script>
                                var editor = CKEDITOR.replace( 'input_1', {
                                        height: 400,
                                        wordcount: {
                                            maxWordCount: 1300,
                                        },
                                        title: 'Rich Text Editor'
                                    } );    
                                editor.on( 'change', function( evt ) { $('#input_1').val(evt.editor.getData()); }); 
                            </script>
                            


                            <div class="row">
                                <div class="col-lg-12 text-xs-right">
                                    <a class="btn btn-lg btn-info-outline" href="artikel.php"><span class="fa fa-backward"></span> KEMBALI </a>
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