<?php 

      include 'template/top.php';
      include "config/auth.php"; 
      include 'config/connect-db.php';

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
                            $ds = mysqli_query($mysqli, "

          SELECT 
                
                AAA.zakat_fitrah_uang,
                AAA.zakat_fitrah_beras,
                AAA.zakat_mal,
                AAA.infaq_sedekah,
                AAA.fidyah,
                
                AAA.set_fitrah_beras,
                AAA.set_fitrah_uang,
                                
                AAA.tot_is_masjid, AAA.tot_is_fakir, AAA.tot_is_yatim,
                
                AAA.total_penyaluran,
                                
                AAA.png_fuang, AAA.png_maal, AAA.png_is, AAA.png_kas, AAA.png_tot,
                                
                AAA.intf_fuang, AAA.intf_maal, AAA.intf_is, AAA.intf_kas, AAA.intf_tot,
                
                AAA.rumus_beras,
                AAA.rumus_uang_a,
                AAA.rumus_uang_b,
                AAA.rumus_uang_c,
                AAA.rumus_uang_d,
                
                
                AAA.rumus_potongan_a,
                AAA.rumus_potongan_b,
                AAA.rumus_potongan_c,
                AAA.rumus_potongan_d,
                
                
                    CASE
                    WHEN 
                        AAA.rumus_beras > 
                       AAA.rumus_uang_a 
                       THEN
                           AAA.rumus_uang_a
                       ELSE 
                         AAA.rumus_beras
                    END as jml_kupon_a,

                    CASE
                    WHEN AAA.rumus_beras > 
                         AAA.rumus_uang_a 
                       THEN
                        AAA.zakat_fitrah_beras % (AAA.set_fitrah_beras * AAA.rumus_uang_a)
                       ELSE 
                        AAA.zakat_fitrah_beras % (AAA.set_fitrah_beras * AAA.rumus_beras)
                    END as sisa_beras_a,
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_a 
                       THEN
                        AAA.rumus_potongan_a - (AAA.rumus_uang_a * AAA.set_fitrah_uang)
                       ELSE 
                        AAA.rumus_potongan_a - (AAA.rumus_beras * AAA.set_fitrah_uang)
                    END as sisa_uang_a,
                    
                    
                    
                    
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                         AAA.rumus_uang_b 
                       THEN
                        AAA.rumus_uang_b
                       ELSE 
                        AAA.rumus_beras
                    END as jml_kupon_b,

                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_b 
                       THEN
                        AAA.zakat_fitrah_beras % (AAA.set_fitrah_beras * AAA.rumus_uang_b)
                       ELSE 
                        AAA.zakat_fitrah_beras % (AAA.set_fitrah_beras * AAA.rumus_beras)
                    END as sisa_beras_b,
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_b 
                       THEN
                        AAA.rumus_potongan_b - (AAA.rumus_uang_b * AAA.set_fitrah_uang)
                       ELSE 
                        AAA.rumus_potongan_b - (AAA.rumus_beras * AAA.set_fitrah_uang)
                    END as sisa_uang_b,
                    
                    
                    
                    
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_c 
                       THEN
                        AAA.rumus_uang_c
                       ELSE 
                        AAA.rumus_beras
                    END as jml_kupon_c,

                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_c 
                       THEN
                        AAA.zakat_fitrah_beras % (AAA.set_fitrah_beras * AAA.rumus_uang_c)
                       ELSE 
                        AAA.zakat_fitrah_beras % (AAA.set_fitrah_beras * AAA.rumus_beras)
                    END as sisa_beras_c,
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_c 
                       THEN
                        AAA.rumus_potongan_c - (AAA.rumus_uang_c * AAA.set_fitrah_uang)
                       ELSE 
                        AAA.rumus_potongan_c - (AAA.rumus_beras * AAA.set_fitrah_uang)
                    END as sisa_uang_c,
                    
                    
                    
                    
                    
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                         AAA.rumus_uang_d 
                       THEN
                        AAA.rumus_uang_d
                       ELSE 
                        AAA.rumus_beras
                    END as jml_kupon_d,

                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_d 
                       THEN
                        SUM(AAA.zakat_fitrah_beras) % (AAA.set_fitrah_beras * AAA.rumus_uang_d)
                       ELSE 
                        SUM(AAA.zakat_fitrah_beras) % (AAA.set_fitrah_beras * AAA.rumus_beras)
                    END as sisa_beras_d,
                    
                    CASE
                    WHEN AAA.rumus_beras > 
                       AAA.rumus_uang_d 
                       THEN
                        AAA.rumus_potongan_d - (AAA.rumus_uang_d * AAA.set_fitrah_uang)
                       ELSE 
                        AAA.rumus_potongan_d - (AAA.rumus_beras * AAA.set_fitrah_uang)
                    END as sisa_uang_d,
                    
                    AAA.pemotongan_zakat_fitrah_uang,
                    AAA.pemotongan_zakat_maal,
                    AAA.pemotongan_zakat_infaqsedeqah,

                    AAA.belanja_beras,
                    AAA.total_beras_dibelanja
                    
                    
                    
                
              FROM(
              
                  SELECT  
                    SUM(a.zakat_fitrah_uang) AS zakat_fitrah_uang,
                    SUM(a.zakat_fitrah_beras) AS zakat_fitrah_beras,
                    SUM(a.zakat_mal) AS zakat_mal,
                    SUM(a.infaq_sedekah) AS infaq_sedekah,
                    SUM(a.fidyah) AS fidyah,
                    
                    b.set_fitrah_beras,
                    b.set_fitrah_uang,
                                      
                    AA.tot_is_masjid, AA.tot_is_fakir, AA.tot_is_yatim,

                    BB.tot_penyaluran AS total_penyaluran,
                                      
                    CC.png_fuang, CC.png_maal, CC.png_is, CC.png_kas, CC.png_tot,
                                      
                    DD.intf_fuang, DD.intf_maal, DD.intf_is, DD.intf_kas, DD.intf_tot,
                    
                    
                    FLOOR(SUM(a.zakat_fitrah_beras) / b.set_fitrah_beras) AS rumus_beras,
                    FLOOR((SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang)) / b.set_fitrah_uang) AS rumus_uang_a,
                    FLOOR(((SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang))+(SUM(a.zakat_mal)-(CC.png_maal+DD.intf_maal))) / b.set_fitrah_uang) AS rumus_uang_b,
                    FLOOR(((SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang))+(AA.tot_is_fakir-(CC.png_is+DD.intf_is))) / b.set_fitrah_uang) AS rumus_uang_c,
                    FLOOR(((SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang))+(SUM(a.zakat_mal)-(CC.png_maal+DD.intf_maal))+(AA.tot_is_fakir-(CC.png_is+DD.intf_is))) / b.set_fitrah_uang) AS rumus_uang_d,
                    
                    SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang) AS rumus_potongan_a,
                    (SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang))+(SUM(a.zakat_mal)-(CC.png_maal+DD.intf_maal)) AS rumus_potongan_b,
                    (SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang))+(AA.tot_is_fakir-(CC.png_is+DD.intf_is)) AS rumus_potongan_c,
                    (SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang))+(SUM(a.zakat_mal)-(CC.png_maal+DD.intf_maal))+(AA.tot_is_fakir-(CC.png_is+DD.intf_is)) AS rumus_potongan_d,


                    SUM(a.zakat_fitrah_uang)-(CC.png_fuang+DD.intf_fuang) AS pemotongan_zakat_fitrah_uang,
                    SUM(a.zakat_mal)-(CC.png_maal+DD.intf_maal) AS pemotongan_zakat_maal,
                    AA.tot_is_masjid-(CC.png_is+DD.intf_is) AS pemotongan_zakat_infaqsedeqah,
                    
                    EE.belanja_beras,
                    EE.total_beras_dibelanja
                    
                  FROM tb_setoran_zis a
                  LEFT JOIN users b ON a.id_user = b.id
                  CROSS JOIN (SELECT COUNT(*) as tot_penyaluran FROM tb_penerimaan_kupon WHERE id_user = $id) BB
                  CROSS JOIN (
                           SELECT
                           SUM(UI.png_fuang) AS png_fuang,
                           SUM(UI.png_maal) AS png_maal,
                           SUM(UI.png_is) AS png_is,
                           SUM(UI.png_kas) AS png_kas,
                           SUM(UI.png_tot) AS png_tot
                          FROM
                          (
                            SELECT 
                              CASE
                                WHEN sumber_pengeluaran = 'ZAKAT FITRAH UANG' THEN tot_pengeluaran
                                ELSE 0
                              END AS png_fuang, 
                              CASE
                                WHEN sumber_pengeluaran = 'ZAKAT MAAL' THEN tot_pengeluaran
                                ELSE 0
                              END AS png_maal,
                              CASE
                                WHEN sumber_pengeluaran = 'INFAQ/SEDEKAH (YANG KE MASJID)' THEN tot_pengeluaran
                                ELSE 0
                              END AS png_is,
                              CASE
                                WHEN sumber_pengeluaran = 'KAS MASJID' THEN tot_pengeluaran
                                ELSE 0
                              END AS png_kas,
                              CASE
                                WHEN sumber_pengeluaran IS NOT NULL THEN tot_pengeluaran
                                ELSE 0
                              END AS png_tot
                            FROM tb_pengeluaran_panitia 
                            WHERE id_user = $id
                          ) UI
                        ) CC
                  CROSS JOIN (
                           SELECT
                           SUM(UI.intf_fuang) AS intf_fuang,
                           SUM(UI.intf_maal) AS intf_maal,
                           SUM(UI.intf_is) AS intf_is,
                           SUM(UI.intf_kas) AS intf_kas,
                           SUM(UI.intf_tot) AS intf_tot
                          FROM
                          (
                            SELECT 
                              CASE
                                WHEN sumber_pengeluaran = 'ZAKAT FITRAH UANG' THEN intensif
                                ELSE 0
                              END AS intf_fuang, 
                              CASE
                                WHEN sumber_pengeluaran = 'ZAKAT MAAL' THEN intensif
                                ELSE 0
                              END AS intf_maal,
                              CASE
                                WHEN sumber_pengeluaran = 'INFAQ/SEDEKAH (YANG KE MASJID)' THEN intensif
                                ELSE 0
                              END AS intf_is,
                              CASE
                                WHEN sumber_pengeluaran = 'KAS MASJID' THEN intensif
                                ELSE 0
                              END AS intf_kas,
                              CASE
                                WHEN sumber_pengeluaran IS NOT NULL THEN intensif
                                ELSE 0
                              END AS intf_tot
                            FROM tb_panitia_zis 
                            WHERE id_user = $id
                          ) UI
                        ) DD
                  CROSS JOIN (
                        SELECT
                            SUM(UX.selisih_uang) AS belanja_beras,
                            SUM(UX.selisih_beras) AS total_beras_dibelanja
                          FROM(
                            SELECT 
                              CASE
                                 WHEN zakat_fitrah_uang != zakat_fitrah_uang_ AND zakat_fitrah_uang > 0 THEN zakat_fitrah_uang_-zakat_fitrah_uang
                                ELSE 0 
                              END AS selisih_uang,
                              CASE
                                 WHEN zakat_fitrah_uang != zakat_fitrah_uang_ AND zakat_fitrah_uang > 0 THEN (zakat_fitrah_uang_-zakat_fitrah_uang)/harga_beras_dimakan
                                ELSE 0 
                              END AS selisih_beras
                            FROM tb_setoran_zis 
                            WHERE id_user = $id
                          ) UX
                        ) EE
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
                
                WHERE a.id_user = $id) AAA ");

                            $dd = mysqli_fetch_array($ds);
                        ?>

                        <center>
                            <span style="font-weight: bold;float: left;">A. STATISTIK DATA</span>
                            <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">Statistik Data Penerimaan</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">Dipotong Pengeluaran Panitia</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td scope="row" style="text-align: left;">
                                        Total Beras (Zakat Fitrah)
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['zakat_fitrah_beras'],0); ?> Liter
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        -
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Uang (Zakat Fitrah)
                                    </td>
                                    <td  data-label="Total">
                                        Rp. <?php echo number_format($dd['zakat_fitrah_uang'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        Tersisa Rp. <?php echo number_format($dd['pemotongan_zakat_fitrah_uang'],0); ?>
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Zakat Maal
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['zakat_mal'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        Tersisa Rp. <?php echo number_format($dd['pemotongan_zakat_maal'],0); ?>
                                    </td>
                                </tr>    
                                <tr>
                                    <td style="text-align: left;">
                                        Total Infaq Sedeqah
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['infaq_sedekah'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        <?php $selisih_is = $dd['tot_is_masjid']-$dd['pemotongan_zakat_infaqsedeqah']; ?>
                                        Tersisa Rp. <?php echo number_format($dd['infaq_sedekah']-$selisih_is,0); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                         <i>- Total Infaq Sedeqah Ke Masjid</i>
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_is_masjid'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        Tersisa Rp. <?php echo number_format($dd['pemotongan_zakat_infaqsedeqah'],0); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                         <i>- Total Infaq Sedeqah Ke Fakir/Miskin</i>
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_is_fakir'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        -
                                    </td>
                                </tr>                
                                <tr>
                                    <td style="text-align: left;">
                                         <i>- Total Infaq Sedeqah Ke Yatim Piatu</i>
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['tot_is_yatim'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        -
                                    </td>
                                </tr>        
                                <tr>
                                    <td style="text-align: left;">
                                        Total Fidyah
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['fidyah'],0); ?>
                                    </td>
                                    <td data-label="Dipotong Pengeluaran Panitia">
                                        -
                                    </td>
                                </tr>    
                            </tbody>
                        </table>
                        <br><br>
                        <b><u>DARI DATA STATISTIK DI ATAS MAKA DIBUATKLAH ANALISIS PENYALURAN</u></b><br><br>
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
                        <b><u>SEHINGGA MENGHASILKAN DATA REALISASI SEBAGAI BERIKUT</u></b>
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
                        <br><br>
                        <b><u>BERIKUT REKAPAN DARI PENGELUARAN PANITIA (YANG MEMPENGARUHI STATSITIK DATA)</u></b>
                        <br><br>
                        <span style="font-weight: bold;float: left;">F. REKAP PENGELUARAN PANITIA</span>
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
                                        Belanja Barang & Perlengkapan
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['png_fuang']+$dd['png_maal']+$dd['png_is'],0); ?>
                                    </td>
                                </tr>  
                                <tr>
                                    <td style="text-align: left;">
                                        Intensif Panitia
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['intf_fuang']+$dd['intf_maal']+$dd['intf_is'],0); ?>
                                    </td>
                                </tr>  
                                <tr>
                                    <td style="text-align: left;">
                                        KAS MASJID YANG DIGUNAKAN (Diluar Data Zakat)
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['png_kas']+$dd['intf_kas'],0); ?>
                                    </td>
                                </tr>          
                               </tbody>
                                
                            </table>
                            <I style="color:red;">(* Untuk Lebih Detail Silahkan Ke Menu Pengeluaran Panitia <b><a href="pengeluaran_panitia.php">Disini</a></b> </I>
                        <br><br>
                        <b><u>INFO TAMBAHAN YAITU BERLANJA BERAS DARI ZAKAT FITRAH UANG KE BERAS (KONVERSI)</u></b>
                        <br><br>
                        <span style="font-weight: bold;float: left;">H. REKAP KONVERSI KE BERAS</span>
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
                                        Belanja Beras Sebanyak
                                    </td>
                                    <td data-label="Total">
                                        <?php echo number_format($dd['total_beras_dibelanja'],0); ?> LITER
                                    </td>
                                </tr>  
                                <tr>
                                    <td style="text-align: left;">
                                        Total Belanja Beras
                                    </td>
                                    <td data-label="Total">
                                        Rp. <?php echo number_format($dd['belanja_beras'],0); ?>
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