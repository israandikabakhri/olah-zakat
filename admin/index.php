<?php 

include('template/top.php');

?>



    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                        <h1 class="mbr-section-title display-2">
                            <center>SELAMAT DATANG ADMIN MASJID
                                    <BR>
                                    ADMIN
                                    <br>
                                    <img src="../img/icon.png" style="width: 40%">
                                
                            </center>
                        </h1>

                            
                          
                                
                   
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