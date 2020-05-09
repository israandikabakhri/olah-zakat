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
                                      SUM(a.fidyah) AS tot_fidyah,
                                      b.set_fitrah_beras,
                                      b.set_fitrah_uang,
                                      AA.tot_is_masjid, AA.tot_is_fakir, AA.tot_is_yatim,
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                         FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang)
                       ELSE FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras)
                    END as jml_kupon_a,

                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                         SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang))
                       ELSE SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras))
                    END as sisa_beras_a,
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) THEN
                         SUM(a.zakat_fitrah_uang) - (FLOOR(SUM(a.zakat_fitrah_uang) / b.set_fitrah_uang) * b.set_fitrah_uang)
                       ELSE SUM(a.zakat_fitrah_uang) - (FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) * b.set_fitrah_uang)
                    END as sisa_uang_a,
                    
                    
                    
                    
                    
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) / b.set_fitrah_uang) THEN
                         FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) / b.set_fitrah_uang)
                       ELSE FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras)
                    END as jml_kupon_b,

                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) / b.set_fitrah_uang) THEN
                         SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) / b.set_fitrah_uang))
                       ELSE SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras))
                    END as sisa_beras_b,
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) / b.set_fitrah_uang) THEN
                         (SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) - (FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) / b.set_fitrah_uang) * b.set_fitrah_uang)
                       ELSE (SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)) - (FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) * b.set_fitrah_uang)
                    END as sisa_uang_b,
                    
                    
                    
                    
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) / b.set_fitrah_uang) THEN
                         FLOOR((SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) / b.set_fitrah_uang)
                       ELSE FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras)
                    END as jml_kupon_c,

                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) / b.set_fitrah_uang) THEN
                         SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR((SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) / b.set_fitrah_uang))
                       ELSE SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras))
                    END as sisa_beras_c,
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) / b.set_fitrah_uang) THEN
                         (SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) - (FLOOR((SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) / b.set_fitrah_uang) * b.set_fitrah_uang)
                       ELSE (SUM(a.zakat_fitrah_uang)+AA.tot_is_fakir) - (FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) * b.set_fitrah_uang)
                    END as sisa_uang_c,
                    
                    
                    
                    
                    
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) / b.set_fitrah_uang) THEN
                         FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) / b.set_fitrah_uang)
                       ELSE FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras)
                    END as jml_kupon_d,

                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) / b.set_fitrah_uang) THEN
                         SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) / b.set_fitrah_uang))
                       ELSE SUM(a.zakat_fitrah_beras) % (b.set_fitrah_beras * FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras))
                    END as sisa_beras_d,
                    
                    CASE
                    WHEN FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) > FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) / b.set_fitrah_uang) THEN
                         (SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) - (FLOOR((SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) / b.set_fitrah_uang) * b.set_fitrah_uang)
                       ELSE (SUM(a.zakat_fitrah_uang)+SUM(a.zakat_mal)+AA.tot_is_fakir) - (FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) * b.set_fitrah_uang)
                    END as sisa_uang_d,
                    
                    BB.tot_penyaluran AS total_penyaluran
                    
                        FROM tb_setoran_zis a
                                    LEFT JOIN users b ON a.id_user = b.id
                  CROSS JOIN (SELECT COUNT(*) as tot_penyaluran FROM tb_penerimaan_kupon WHERE id_user = $id) BB
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
                            <span style="font-weight: bold;float: left;">A. STATISTIK DATA</span>
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
                                        <?php echo number_format($dd['tot_fitrah_beras'],0); ?> Liter
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
                                        Total Zakat Maal
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
                        <span style="font-weight: bold;float: left;">B. ANALISIS PENYALURAN (Aturan Penyaluran Masjid)</span>
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
                                        <?php echo number_format($dd['jml_kupon_a'],0); ?> Kupon
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Beras
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['sisa_beras_a'],0); ?> Liter
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Uang
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['sisa_uang_a'],0); ?>
                                    </td>

                                </tr> 
                               </tbody>
                                
                            </table>
                        <br><br>
                        <span style="font-weight: bold;float: left;">C. ANALISIS PENYALURAN (Aturan Penyaluran Masjid + Zakat Maal)</span>
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
                                        Total Kupon Yang Bisa Dicetak Per KK
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_b'],0); ?> Kupon
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Beras
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['sisa_beras_b'],0); ?> Liter
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Uang
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['sisa_uang_b'],0); ?>
                                    </td>

                                </tr> 
                               </tbody>
                                
                            </table>                            
                        <br><br>
                        <span style="font-weight: bold;float: left;">D. ANALISIS PENYALURAN (Aturan Penyaluran Masjid + Infaq Sedekah Ke Fakir/Miskin)</span>
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
                                        Total Kupon Yang Bisa Dicetak Per KK
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_c'],0); ?> Kupon
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Beras
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['sisa_beras_c'],0); ?> Liter
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Uang
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['sisa_uang_c'],0); ?>
                                    </td>

                                </tr> 
                               </tbody>
                                
                            </table>
                        <br><br>
                        <span style="font-weight: bold;float: left;">E. ANALISIS PENYALURAN (Aturan Penyaluran Masjid + Zakat Maal + Infaq Sedeqah Ke Fakir/Miskin)</span>
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
                                        Total Kupon Yang Bisa Dicetak Per KK
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_d'],0); ?> Kupon
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Beras
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['sisa_beras_d'],0); ?> Liter
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Sisa Uang
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['sisa_uang_d'],0); ?>
                                    </td>

                                </tr> 
                               </tbody>
                                
                            </table>
                        <br><br>
                        <span style="font-weight: bold;float: left;">F. REALISASI</span>
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
                                        Total Kupon Di Bagikan Saat Ini
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['total_penyaluran'],0); ?> Kupon
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Sisa Kupon Berdasarkan <b>A. Aturan Penyaluran Masjid</b>
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_a']-$dd['total_penyaluran'],0); ?> Sisa Kupon belum Terealisasi
                                    </td>
                                </tr> 
                                <tr>
                                    <td style="text-align: left;">
                                        Sisa Kupon Berdasarkan <b>B. Aturan Penyaluran Masjid + Zakat Mal</b>
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_b']-$dd['total_penyaluran'],0); ?> Sisa Kupon belum Terealisasi
                                    </td>
                                </tr> 
                                <tr>
                                    <td style="text-align: left;">
                                        Sisa Kupon Berdasarkan <b>C. Aturan Penyaluran Masjid + Infaq Sedeqah (Ke Fakir/Miskin)</b>
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_c']-$dd['total_penyaluran'],0); ?> Sisa Kupon belum Terealisasi
                                    </td>
                                </tr> 
                                <tr>
                                    <td style="text-align: left;">
                                        Sisa Kupon Berdasarkan <b>D. Aturan Penyaluran Masjid + Zakat Maal + Infaq Sedeqah (Ke Fakir/Miskin)</b>
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['jml_kupon_d']-$dd['total_penyaluran'],0); ?> Sisa Kupon belum Terealisasi
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