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
        window.location = (\"studentResult.php\");
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
    <h3><b>CAVITE STATE UNIVERSITY - GENERAL TRIAS CITY CAMPUS</b></h3>
     <h4><b><?php echo $rowDept['departmentName'];?></b></h4>
    </div>
   <div class="breadcrumbs" >
            <div class="breadcrumbs-inner">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header float-left">
                            <div class="page-title">
                            <table style="width:100%;">
                             <tr>
                                <td><h4>Student: <b><?php echo  $rowStd['firstName'].' '.$rowStd['lastName'].' '.$rowStd['middleName'];?></b></h4></td>
                                  <td><h4>Student ID: <b><?php echo $rowStd['studentId'];?>&nbsp;&nbsp;&nbsp;&nbsp; Semester: <b><?php echo $rowSemester['semesterName'];?> </b></h4></td>
                                 <tr>
                                     <td><h4>Year: <b><?php echo $rowYear['yearName'];?>&nbsp;&nbsp;&nbsp;&nbsp; School Year: <b><?php echo $rowSession['sessionName'];?></b></h4></td> 
                                     <td><h4>Date <?php echo date('Y-m-d');?></h4></td> 
                                </tr>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="card-body">
                    <div  align="center"><h4>CERTIFICATE OF GRADES</h4></div>
                    <table class="table table-hover table-striped table-bordered" style="width:100%;" border="0.1">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Course Code</th>
                                <th>Unit</th>
                                <th>Grade</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php

                $ret=mysqli_query($con,"SELECT tblresult.studentId,tblresult.yearId,tblresult.courseCode,tblresult.courseUnit,tblresult.score,tblresult.scoreGradePoint,
                tblresult.totalScoreGradePoint,tblresult.dateAdded,tblcourse.courseTitle,
                tblyear.yearName,tblsemester.semesterName,tblsession.sessionName
                from tblresult
                INNER JOIN tblyear ON tblyear.Id = tblresult.yearId
                INNER JOIN tblcourse ON tblcourse.courseCode = tblresult.courseCode
                INNER JOIN tblsemester ON tblsemester.Id = tblresult.semesterId
                INNER JOIN tblsession ON tblsession.Id = tblresult.sessionId
                where tblresult.yearId ='$yearId' and tblresult.sessionId ='$sessionId'
                and tblresult.semesterId ='$semesterId' and tblresult.studentId ='$studentId'");
                $cnt=1;  $totalCourseUnit = 0;  $totalScoreGradePoint = 0;
                while ($row=mysqli_fetch_array($ret)) {
                     
                ?>
                <tr>
                <td bgcolor="<?php echo $color;?>"><?php  echo $cnt;?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseTitle'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseCode'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseUnit'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['scoreGradePoint'];?></td>
                </tr>
                <?php
                    $cnt=$cnt+1;
                    $courseUnit = $row['courseUnit'];
                    $totalCourseUnit += $courseUnit;
                }?>
                <tr>
                <td bgcolor=""> </td>
                <td bgcolor=""> </td>
                <td bgcolor=""> </td>
                <td bgcolor=""><?php echo $totalCourseUnit;?></td>
                <td bgcolor=""> </td>
                </tr>
                </tbody>
                <thead>
                <tr>
        
                   
                   <th></th>
                   <th></th>
                    <th>Total Course Unit</th>
                    <th>Average</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
        <?php

             $ret=mysqli_query($con,"SELECT tblfinalresult.studentId,tblfinalresult.yearId,tblfinalresult.totalCourseUnit,tblfinalresult.totalScoreGradePoint,tblfinalresult.gpa,
                    tblfinalresult.UnitAverage,tblfinalresult.dateAdded,
                    tblyear.yearName,tblsemester.semesterName,tblsession.sessionName
                    from tblfinalresult
                    INNER JOIN tblyear ON tblyear.Id = tblfinalresult.yearId
                    INNER JOIN tblsemester ON tblsemester.Id = tblfinalresult.semesterId
                    INNER JOIN tblsession ON tblsession.Id = tblfinalresult.sessionId
                    where tblfinalresult.yearId ='$yearId' and tblfinalresult.sessionId ='$sessionId' 
                    and tblfinalresult.semesterId ='$semesterId' and tblfinalresult.studentId ='$studentId'");
                    $cnt=1;  $totalCourseUnit = 0;  $totalScoreGradePoint = 0;
                    while ($row=mysqli_fetch_array($ret)) {
                    ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td bgcolor="#99ff99"><?php  echo $row['totalCourseUnit'];?></td>
                    <td bgcolor="#99ff99"><?php  echo $row['UnitAverage'];?></td>
                    <td bgcolor="#99ff99"><?php  echo $row['gpa'];?></td>
                    </tr>
                    <?php 
                   
                  
                            }
                        ?>
                    </tbody>
                </table>
                    
          
            

              

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
$dompdf->stream('Certificate Of Grades');

?>
