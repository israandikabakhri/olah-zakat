<?php include('template/top.php') ?>
    



            <?php
                $id = $_GET['id'];
                $id_user = $_SESSION['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_setoran_zis WHERE id = $id");
                $d  = mysqli_fetch_array($dt);


                $dt  = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id_user");
                $dx  = mysqli_fetch_array($dt);
                $brs = $dx['set_beras_muzakki']; 

                // Mencegah User Akses Bukan Haknya
                $dw = mysqli_query($mysqli, "SELECT COUNT(*) as tot FROM tb_setoran_zis WHERE id = $id AND  id_user = $_SESSION[id]");
                $dc  = mysqli_fetch_array($dw);

                if($dc['tot'] == 0){
                    echo '<script language="javascript"> alert("Anda Tidak Boleh Mengakses Data Ini!"); window.location.href = "penyetoran.php" </script>';
                } 
                
            ?>




<form action="controller.php?page=penyetoran&action=konversi" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">Konversi Zakat Fitrah</h4>

                        <hr>

                        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">

                        <table width="55%">
                            <tr>
                                <td width="320"><b>Tanggal Penerimaan</td>
                                <td><?php echo TanggalIndo($d['tgl']); ?></td> 
                            </tr>
                            <tr>
                                <td><b>Nama Muzakki</td>
                                <td><?php echo $d['nama_muzakki'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Jiwa</td>
                                <td><?php echo $d['jumlah_jiwa'] ?> Orang</td>
                            </tr>
                            <tr>
                                <td><b>Harga Beras Yang Dimakan Per Liter</td>
                                <td>Rp. <?php echo number_format($d['harga_beras_dimakan'],0) ?></td>
                            </tr>
                            <tr>
                                <td><b>Total Jumlah Zakat Uang</td>
                                <td>Rp. <?php echo number_format($d['zakat_fitrah_uang'],0) ?></td>
                            </tr>
                            <tr>
                                <td><b>Total Jumlah Zakat Uang</td>
                                <td><?php echo number_format($d['zakat_fitrah_beras'],0) ?> Liter</td>
                            </tr>
                        </table>

                        <?php $batas_konversi_beras =  ($d['zakat_fitrah_uang']/$d['harga_beras_dimakan'])/$brs; ?>
                        <?php $batas_konversi_uang  =  $d['zakat_fitrah_beras']/$brs; ?>

                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="hidden" name="harga_beras" value="<?php echo $d['harga_beras_dimakan']; ?>">
                        <input type="hidden" name="zakat_beras" value="<?php echo $d['zakat_fitrah_beras']; ?>">
                        <input type="hidden" name="zakat_uang" value="<?php echo $d['zakat_fitrah_uang']; ?>">

                        <br>
                        <input type="radio" name="konv" value="uang2beras" checked> <b style="color: blue;">Konversi Uang Ke Beras</b> &nbsp;&nbsp;
                        <input type="radio" name="konv" value="beras2uang"> <b style="color: green;">Konversi Beras Ke Uang</b>
                        <br><br>

                        <div class="mbr-section-text" id="beras">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span style="color: blue;font-weight: bold;">Pilihan Konversi Dari Uang Ke Beras</span>
                                        <select class="form-control" name="beras" id="berasval" required>
                                            <?php if($batas_konversi_beras != 0){ ?>
                                            <option value="0">-- TERSEDIA <?php echo $batas_konversi_beras; ?> PILIHAN --</option>
                                            <?php }else{ ?>
                                            <option value="0">-- TIDAK ADA PILIHAN UNTUK DIKONVERSIKAN --</option>
                                             <?php } ?>

                                             <?php 
                                             for ($i=1; $i <= $batas_konversi_beras; $i++) { 
                                                 echo '<option value="'.$i.'">Rp. '.number_format($d['harga_beras_dimakan']*$brs*$i).' Dikonversi Ke '.$i*$brs.' Liter Beras</option>';
                                             }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        
                        <div class="mbr-section-text" id="uang" style="display: none;">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span style="color: green;font-weight: bold;">Pilihan Konversi Dari Beras Ke Uang</span>
                                        <select class="form-control" name="uang" id="uangval">

                                            <?php if($batas_konversi_uang != 0){ ?>
                                            <option value="0">-- TERSEDIA <?php echo $batas_konversi_uang; ?> PILIHAN --</option>
                                            <?php }else{ ?>
                                            <option value="0">-- TIDAK ADA PILIHAN UNTUK DIKONVERSIKAN --</option>
                                             <?php } ?>

                                             <?php 
                                             for ($i=1; $i <= $batas_konversi_uang; $i++) { 
                                                 echo '<option value="'.$i.'">'.$i*$brs.' Liter Beras Dikonversi Ke Rp. '.number_format($d['harga_beras_dimakan']*$brs*$i).'</option>';
                                             }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script type="text/javascript">
                          $('input[type=radio][name=konv]').on('change', function (e) {
                            
                             if(this.value == "uang2beras"){
                                $('#beras').show();
                                $('#uang').hide();
                                $('#uangval').val("0");
                                $('#berasval').attr('required', true);
                                $('#uangval').attr('required', false);
                             }else if(this.value == "beras2uang"){
                                $('#beras').hide();
                                $('#uang').show();
                                $('#berasval').val("0");
                                $('#uangval').attr('required', true);
                                $('#berasval').attr('required', false);
                             }
                          });
                        </script>


                        <div class="mbr-section-text">

            

                            <div class="row">
                                <div class="col-lg-12 text-xs-right">
                                    <a class="btn btn-lg btn-info-outline" href="penyetoran.php"><span class="fa fa-backward"></span> KEMBALI </a>
                                    <button type="submit" name="simpan" class="btn btn-lg btn-primary">Konversikan</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    
<?php 

    function TanggalIndo($date){
    
          $BulanIndo = array( 
                            "Jan", 
                            "Feb", 
                            "Mar", 
                            "Apr", 
                            "Mei", 
                            "Jun", 
                            "Jul", 
                            "Agu", 
                            "Sep", 
                            "Okt", 
                            "Nov", 
                            "Des"
                            );

          $tahun = substr($date, 0, 4);
          $bulan = substr($date, 5, 2);
          $tgl   = substr($date, 8, 2);

          $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
          return($result);
    
    }
?>





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