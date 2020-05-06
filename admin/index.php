<?php 

      include('template/top.php');
      include "../config/auth.php"; 
      include '../config/connect-db.php';

      $id=$_SESSION['id'];
      $dt = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
      $da = mysqli_fetch_array($dt);

?>


    <style type="text/css">
        table tr td{
            text-align: left;
        }
    </style>


    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                        <h1 class="mbr-section-title display-3">
                            <center style="font-size: 20px;">SELAMAT DATANG ADMIN
                                    <BR>
                                    <?php echo strtoupper($da['nama']); ?>
                                    <br>


                            </center>
                        </h1>

                        <?php
                            $no=1;
                            $id=$_SESSION['id'];
                            $ds = mysqli_query($mysqli, "SELECT  
                                      SUM(a.zakat_fitrah_uang) AS tot_fitrah_uang,
                                      SUM(a.zakat_fitrah_beras) AS tot_fitrah_beras,
                                      SUM(a.zakat_mal) AS tot_zakat_mal,
                                      SUM(a.infaq_sedekah) AS tot_infaq_sedekah,
                                      AA.tot_is_masjid, AA.tot_is_fakir, AA.tot_is_yatim,
                                      SUM(a.fidyah) AS tot_fidyah,
                                      b.set_fitrah_beras,
                                      b.set_fitrah_uang,
                                    CASE
                                        WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                                             FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang)
                                             ELSE FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras)
                                      END as jml_kupon,
                                      
                                      CASE
                                        WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                                             SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang))
                                             ELSE SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras))
                                      END as sisa_beras,
                                      
                                      
                                      CASE
                                        WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                                             SUM(a.zakat_fitrah_uang) - (FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) * b.set_fitrah_uang)
                                             ELSE SUM(a.zakat_fitrah_uang) - (FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) * b.set_fitrah_uang)
                                      END as sisa_uang, 
                                      
                                      CASE
                                        WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                                             CONCAT('Beras Lebih Dominan Dari Uang ', FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras), ' > ', FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang))
                                             ELSE 'Uang Lebih Dominan Dari Beras Atau Nilainya Setara'
                                      END as keterangan

                                    FROM tb_setoran_zis a
                                    LEFT JOIN users b ON a.id_user = b.id
                                    CROSS JOIN (
                                                            SELECT  
                                                              SUM(A.masjid) AS tot_is_masjid,
                                                              SUM(A.fakir) AS tot_is_fakir,
                                                              SUM(A.yatim) AS tot_is_yatim
                                                            FROM
                                                            (   
                                                                SELECT IFNULL(SUM(infaq_sedekah),0) AS masjid, 0 AS fakir, 0 AS yatim FROM tb_setoran_zis WHERE id_user = $id AND arah_infaqsedekah = 'MASJID'
                                                                UNION
                                                                SELECT 0 AS masjid, IFNULL(SUM(infaq_sedekah),0) AS fakir, 0 AS yatim FROM tb_setoran_zis WHERE id_user = $id AND arah_infaqsedekah = 'FAKIR/MISKIN'
                                                                UNION
                                                                SELECT 0 AS masjid, 0 AS fakir, IFNULL(SUM(infaq_sedekah),0) AS yatim FROM tb_setoran_zis WHERE id_user = $id AND arah_infaqsedekah = 'YATIM PIATU'
                                                            ) A
                                                )AA
                                    WHERE a.id_user = $id");

                            $dd = mysqli_fetch_array($ds);
                        ?>

                        <center>

                            <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">Uraian</th>
                                  <th scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td scope="row" style="text-align: left;">
                                        Total Beras (Zakat Fitrah)
                                    </td>
                                    <td data-label="Total">
                                        <?php echo $dd['tot_fitrah_beras']; ?> Liter
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Uang (Zakat Fitrah)
                                    </td>
                                    <td  data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_fitrah_uang'],0); ?>
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Zakat Mal
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_zakat_mal'],0); ?>
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Infaq Sedeqah
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_infaq_sedekah'],0); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                         <i>- Total Infaq Sedeqah Ke Masjid</i>
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_is_masjid'],0); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                         <i>- Total Infaq Sedeqah Ke Fakir/Miskin</i>
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_is_fakir'],0); ?>
                                    </td>
                                </tr>                
                                <tr>
                                    <td style="text-align: left;">
                                         <i>- Total Infaq Sedeqah Ke Yatim Piatu</i>
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_is_yatim'],0); ?>
                                    </td>
                                </tr>        
                                <tr>
                                    <td style="text-align: left;">
                                        Total Fidyah
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_fidyah'],0); ?>
                                    </td>
                                </tr>    
                            </tbody>
                        </table>
                        <br><br>
                        <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">Uraian</th>
                                  <th scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td style="text-align: left;">
                                        Total Kupon Yang Bisa Dicetak
                                        <br>
                                        Dengan Aturan Penyaluran:<br> 
                                        <b><?php echo number_format($dd['set_fitrah_beras'],0); ?> Liter & Uang Rp. <?php echo number_format($dd['set_fitrah_uang'],0); ?> Per KK</b>
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon'],0); ?> Kupon
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Beras
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['sisa_beras'],0); ?> Liter
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Uang
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['sisa_uang'],0); ?>
                                    </td>

                                </tr> 
                               </tbody>
                                
                            </table>                            
                        </center>
                                
                   
                    </div>
                </div>
            </div>
        </div>
    </section>


<script type="text/javascript">
    $(this).ready(function(){
        ambil_data();
    });
    function ambil_data(){
        $.ajax({
            url: 'https://sinovik.menpan.go.id/index.php/data_rekapitulasi',
            dataType: 'json',
            error: function(E){
                console.log("Gagal mengambil data");
            },
            success: function(S){
                $('#table-rekapitulasi tbody:last').empty().append(S.data);
                $('#total_rekap').empty().append(S.total_rekap);
                $('#table-rekap-evaluator tbody:last').empty().append(S.eval);
                $('#total_rekap_eval').empty().append(S.total_eval);
            }
        });
    }
</script>

<script type="text/javascript">
    var clock;

    $(document).ready(function() {

        // Grab the current date
        var currentDate = new Date();

        // Set some date in the future. In this case, it's always Jan 1
        var futureDate  = new Date(2019, 3, 21, 23, 59);

        // Calculate the difference in seconds between the future and current date
        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

        if(diff < 0) {
            diff = 0;
        }
        
        // Instantiate a coutdown FlipClock
        clock = $('.countdown-timer').FlipClock(diff, {
            clockFace: 'DailyCounter',
            countdown: true
        });
    });
</script>

<?php $tinggi = '300x'; include('template/bottom.php') ?>