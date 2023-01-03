<?php
// namespace Dompdf;
require_once '../dompdf/autoload.inc.php';
ob_start();

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/functions.php');



    if(isset($_GET['studentId']) && isset($_GET['yearId'])  && isset($_GET['sessionId']) && isset($_GET['semesterId'])){

        $studentId = $_GET['studentId'];
        $yearId = $_GET['yearId'];
        $sessionId = $_GET['sessionId'];
        $semesterId = $_GET['semesterId'];


        $stdQuery=mysqli_query($con,"select * from tblstudent where studentId = '$studentId'");
        $rowStd = mysqli_fetch_array($stdQuery);
        $departmentId = $rowStd['departmentId'];

        $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");
        $rowSemester = mysqli_fetch_array($semesterQuery);

        $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");
        $rowSession = mysqli_fetch_array($sessionQuery);

        $yearQuery=mysqli_query($con,"select * from tblyear where Id = '$yearId'");
        $rowYear = mysqli_fetch_array($yearQuery);

        $deptQuery=mysqli_query($con,"select * from tbldepartment where Id = '$departmentId'");
        $rowDept = mysqli_fetch_array($deptQuery);

    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"studentList3.php\");
        </script>";
    }



//------------------------------------ COMPUTE RESULT -----------------------------------------------

if (isset($_POST['compute'])){


}//end of POST


?>



<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    

</head>
<body>
    <!-- Left Panel -->
    <div align="center"> 
    <h3 align="center"><b>CAVITE STATE UNIVERSITY -  GENERAL TRIAS CITY CAMPUS</h3>
     <h4><b>GRADING CRITERIA</h4>
    </div>
  
    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered" style="width:100%" border="0.2">
                            <thead>
                            <tr>
                                <th>Class Of Diploma</th>
                                <th>Average</th>
                            </tr>
                        </thead>
                        <tbody>
                           
               
                        <tr >
                <td>Pass</td>
                <td>1.75 and above</td>
                </tr>
                 <tr >
                <td>Upper Credit</td>
                <td>2.25 - 2.00</td>
                </tr>
                 <tr >
                <td>Lower Credit</td>
                <td>2.50 - 3.00</td>
                </tr>
                 <tr >
                <td>Failed</td>
                <td>5.00 & below/Failed</td>
                </tr>
                 <tr >
                <td>Conditional</td>
                <td>4.00 = 50.0 - 69.9</td>
                </tr>
                <tr>
                <td>INC</td>
                <td>Incomplete</td>
                </tr>
                <tr>
                <td>DRP</td>
                <td>DROPPED</td>
                </tr>
                <tr>
                <td>NG</td>
                <td>NO GRADE</td>
                </tr>
                </tbody>
            </table>
            <br>  <br>
<!-------------------------- FROM THE FINAL RESULT TABLE --------------------------->
            <table class="table table-striped table-bordered" style="width:100%" border="0.2">
                <thead>
                <tr>
                    <th>Grade</th>
                    <th>Grade Point Equivalent</th>
                    
                </tr>
            </thead>
            <tbody>
            <tr >
                <td>96.7 - 100</td>
                <td>1.00</td>
               
                </tr>
                <tr >
                <td>93.4 - 96.6</td>
                <td>1.25</td>
                
                </tr>
                <tr >
                <td>90.1 - 93.3</td>
                <td>1.50</td>
                
                </tr>
                <tr >
                <td>86.7 - 90.0</td>
                <td>1.75</td>
                
                </tr>
                <tr >
                <td>83.4 - 86.6</td>
                <td>2.00</td>
                
                </tr>
                <tr >
                <td>80.1 - 83.3</td>
                <td>2.25</td>
                </tr>

                <tr >
                <td>76.7 - 80.0</td>
                <td>2.50</td>
                
                </tr>
                <tr >
                <td>73.4 - 76.6</td>
                <td>2.75</td>
                
                </tr>
                <tr >
                <td>70.0 - 73.3</td>
                <td>3.00</td>
                
                </tr>
                <tr >
                <td>50.0 - 69.9</td>
                <td>4.00</td>
               
                </tr>
                <td>49.9</td>
                <td>5.00</td>
               
                </tr>
                                                                                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
             

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

           
  </script>

</body>
</html>
<?php

// reference the Dompdf namespace
use Dompdf\Dompdf;
$html = ob_get_clean();
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('CvSU Grading Criteria');

?>
