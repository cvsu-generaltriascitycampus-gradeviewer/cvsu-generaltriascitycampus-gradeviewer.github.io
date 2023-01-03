
<?php

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

        $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");                        
        $rowSemester = mysqli_fetch_array($semesterQuery);

        $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");                        
        $rowSession = mysqli_fetch_array($sessionQuery);

        $yearQuery=mysqli_query($con,"select * from tblyear where Id = '$yearId'");                        
        $rowyear = mysqli_fetch_array($yearQuery);

    
    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"studentList.php\");
        </script>";
    
    }



//------------------------------------ COMPUTE RESULT newly added-----------------------------------------------

 if (isset($_POST['compute'])){

    $id = $_POST['Id']; //Array of Id's
    $N = count($id);

   $totalCourseUnit = $_POST['totalCourseUnit'];
   $totalScoreGradePoint = $_POST['totalScoreGradePoint'];
   $dateAdded = date("Y-m-d");

   $overAllCourseUnit = 0;
   $overAlltotalScoreGradePoint = 0;
   $cgpa = 0;

   for($i = 0; $i < $N; $i++)
   {
       $totalCourseUnit[$i]; //each totalCourseUnit
       $totalScoreGradePoint[$i]; // each totalScoreGradePoint

       $overAllCourseUnit += $totalCourseUnit[$i]; //adds up all the totalCourseUnits
       $overAlltotalScoreGradePoint += $totalScoreGradePoint[$i]; //adds up all the totalScoreGradePoint
     
   }

       $cgpa = round(($overAlltotalScoreGradePoint / $overAllCourseUnit), 2); //computes the student CGPA (Cumulative Grade Point Average) by dividing the overall course unit and the over score grade point
       $UnitAverage = getUnitAverage($cgpa); //function to get the class of diploma for the CGPA

       $que=mysqli_query($con,"select * from tblcgparesult where studentId ='$studentId'");
       $ret=mysqli_fetch_array($que);

       if($ret > 0){ //update the record if record exists

           $que=mysqli_query($con,"update tblcgparesult set cgpa='$cgpa', UnitAverage='$UnitAverage' where studentId='$studentId'");

           if($que){
               
                $alertStyle ="alert alert-success";
                $statusMsg="CGPA Computed and Updated Successfully!";
               
           }
           else {

               $alertStyle ="alert alert-danger";
               $statusMsg="An Error Occurred!";
           }
       }
       else{ //insert new record

               $querys = mysqli_query($con,"insert into tblcgparesult(studentId,cgpa,UnitAverage,dateAdded) 
               value('$studentId','$cgpa','$UnitAverage','$dateAdded')");

               if ($querys) {

                   $alertStyle ="alert alert-success";
                   $statusMsg="CGPA Computed Successfully!";
               }
               else
               {
                   $alertStyle ="alert alert-danger";
                   $statusMsg="An error Occurred!";
               }
           }
   

       // echo $cgpa.'<br>';
       // echo $UnitAverage.'<br>';
       // echo $overAllCourseUnit.'<br>';
       // echo $overAlltotalScoreGradePoint.'<br>';

  

     
 
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

    
<body>
    <!-- Left Panel -->
     
         <?php include 'includes/leftMenu.php';?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
                    <?php include 'includes/header.php';?>
        <!-- Header-->

       
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          
                        </div> 
                    </div>
               
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h4 align ="center">Semester Result</h4></strong>
                                <?php echo  $rowStd['firstName'].' '.$rowStd['lastName']?>&nbsp;<?php echo $rowyear ['yearName'] ?> &nbsp;<?php echo $rowSemester ['semesterName'] ?> 
                            </div>
                            <div class="card-body">
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                                <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Unit</th>
                                            <th>Grade</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php
                            

                                $ret=mysqli_query($con,"SELECT tblresult.studentId,tblresult.yearId,tblresult.courseCode,tblresult.courseUnit,tblresult.score,tblresult.scoreGradePoint,
                                tblcourse.courseTitle,
                                tblyear.yearName,tblsemester.semesterName,tblsession.sessionName
                                from tblresult
                                INNER JOIN tblyear ON tblyear.Id = tblresult.yearId
                                INNER JOIN tblcourse ON tblcourse.courseCode = tblresult.courseCode
                                INNER JOIN tblsemester ON tblsemester.Id = tblresult.semesterId
                                INNER JOIN tblsession ON tblsession.Id = tblresult.sessionId
                                where tblresult.yearId ='$yearId' and tblresult.sessionId ='$sessionId' 
                                and tblresult.semesterId ='$semesterId' and tblresult.studentId ='$studentId'");
                                $cnt=1;  $totalCourseUnit = 0;      
                                while ($row=mysqli_fetch_array($ret)) {
                                
                                ?>
                            
                                <tr >
                                    <td bgcolor=""><?php  echo $cnt;?></td>
                                    <td bgcolor=""><?php  echo $row['courseTitle'];?></td>
                                    <td bgcolor=""><?php  echo $row['courseCode'];?></td>
                                    <td bgcolor=""><?php  echo $row['courseUnit'];?></td>
                                    <td bgcolor=""><?php  echo $row['scoreGradePoint'];?></td>
                                </tr>
                                <?php 
                                   $cnt=$cnt+1;
                                    $courseUnit = $row['courseUnit'];
                                    $totalCourseUnit += $courseUnit;
                                }?>                                                      
                                </tbody>
                      
  
                                 <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Remarks</th>
                                        <th>Total Course Unit</th>
                                        <th>Average</th>
                                    </tr>
                                </thead>
                                    
                                    <tbody>
                                        <?php
                                            
                                                $ret=mysqli_query($con,"SELECT tblfinalresult.studentId,tblfinalresult.yearId,tblfinalresult.totalCourseUnit,tblfinalresult.gpa,
                                                tblfinalresult.UnitAverage,tblfinalresult.dateAdded,
                                                tblyear.yearName,tblsemester.semesterName,tblsession.sessionName
                                                from tblfinalresult
                                                INNER JOIN tblyear ON tblyear.Id = tblfinalresult.yearId
                                                INNER JOIN tblsemester ON tblsemester.Id = tblfinalresult.semesterId
                                                INNER JOIN tblsession ON tblsession.Id = tblfinalresult.sessionId
                                                where tblfinalresult.yearId ='$yearId' and tblfinalresult.sessionId ='$sessionId' 
                                                and tblfinalresult.semesterId ='$semesterId' and tblfinalresult.studentId ='$studentId'");
                                                 
                                                while ($row=mysqli_fetch_array($ret)) {
                                        ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td bgcolor="#99ff99"><?php  echo $row['UnitAverage'];?></td>
                                                    <td bgcolor="#99ff99"><?php  echo $totalCourseUnit;?></td>
                                                    <td bgcolor="#99ff99"><?php  echo $row['gpa'];?></td>
                                            
                                                </tr>
                                                <?php 
                                            
                                                
                                            }?> 
                                            
                                            
                                                
                                    </tbody>
                                </table>
                                <a href="studentList3.php" class="btn btn-primary">Go Back</a>
                                <a href="printSemesterResult.php?semesterId=<?php echo $semesterId;?>&studentId=<?php echo $studentId;?>&yearId=<?php echo $yearId;?>&sessionId=<?php echo $sessionId;?>" class="btn btn-info"><i class="fa fa-print"> </i>Download Result</a>
                            </div>
                        </div>
                    </div>
                                    
                <!-- end of datatable -->

        

    <div class="clearfix"></div>

        <?php include 'includes/footer.php';?>


</div><!-- /#right-panel -->

<!-- Right Panel -->

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

      
  </script>

</body>
</html>
