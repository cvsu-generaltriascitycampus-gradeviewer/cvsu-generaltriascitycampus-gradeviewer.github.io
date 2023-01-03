
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/dataValues.php');

        $query = mysqli_query($con,"select * from tbladmin where staffId='$staffId'");
        $row = mysqli_fetch_array($query)
?>

<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php';?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <!-- <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css"> -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
</head>

<body>
    <!-- Left Panel -->
    <?php $page="dashboard"; include 'includes/leftMenu.php';?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
    <?php include 'includes/header.php';?>
    
        <!-- /#header -->
        <!-- Content -->
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 align="center"><b>WELCOME ADMIN</b></h3>
                            </div>
                            
                        </div>
                    </div><!-- /# column -->

                    <!-- ======= Dashboard Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <!-- mision-->
        <div class="section-title">
          <h2>Our Current School Year</h2>
          <p>2022 - 2023</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="Cvsu-gentri.jpg" style="height:400px;" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
			
            </p>
          <!--Program-->
          <div class="section-title">
          <h2>University Program</h2>
          <p>Our Faculties</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
            <b>Bachelor Of Science in Information Technology <br><br>
            <b>Bachelor of Secondary Education<br><br>
            <b>Bachelor of Science in Business Management<br><br>
            <b>Bachelor of Science in Pyschology<br><br>
            <b>Bachelor of Science in Office Administration<br><br>
            <b>Bachelor of Science in Hospitality Management<br><br>
            <b>Bachelor of Science in Tourism Management<br>
    </p>
          </div>
        </div>

        <!--school Department-->
        <div class="section-title">
          <h2>University Department</h2>
          <p>Our Departments</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
			<b>Department of Arts, Sciences, Education and Technology<br><br>
            <b>Department of Management Studies<br>
           
            </p><br><br>
           
          </div>
        </div>

         
        
      </div>
    </section><!-- End About Section -->

                
       
      <?php include 'includes/footer.php';?>
      
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <!-- <script src="../assets/js/main.js"></script> -->
    <script src="../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    <script>

        // Menu Trigger
$('#menuToggle').on('click', function(event) {
  var windowWidth = $(window).width();   		 
  if (windowWidth<1010) { 
    $('body').removeClass('open'); 
    if (windowWidth<760){ 
      $('#left-panel').slideToggle(); 
    } else {
      $('#left-panel').toggleClass('open-menu');  
    } 
  } else {
    $('body').toggleClass('open');
    $('#left-panel').removeClass('open-menu');  
  } 
     
}); 

 
$(".menu-item-has-children.dropdown").each(function() {
  $(this).on('click', function() {
    var $temp_text = $(this).children('.dropdown-toggle').html();
    $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>'); 
  });
});
    </script>
</body>

</html>