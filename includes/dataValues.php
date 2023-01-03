
<?php 
error_reporting(0);

$query = mysqli_query($con,"select * from tblstudent where studentId='$studentId'");
$row = mysqli_fetch_array($query);
$departmentId = $row['departmentId'];
$programId = $row['programId'];
$yearId = $row['yearId'];


$que=mysqli_query($con,"select * from tbldepartment where Id = '$departmentId'"); //department                     
$row = mysqli_fetch_array($que);  
$departmentName = $row['departmentName'];      


$que=mysqli_query($con,"select * from tblprograms where Id = '$programId'"); //faculty                      
$row = mysqli_fetch_array($que);  
$ProgramName = $row['ProgramName'];      



////////////  ADMINISTRATOR DASHBOARD //////////////

$queryStudent=mysqli_query($con,"select * from tblstudent where programId = '$programId' and departmentId = '$departmentId'"); //assigned staff
$adminCountStudent = mysqli_num_rows($queryStudent);

$queryCourses=mysqli_query($con,"select * from tblcourse where programId = '$programId' and departmentId = '$departmentId'"); //today's Attendance
$adminCountCourses=mysqli_num_rows($queryCourses);




//-------------------------SUPER ADMINISTRATOR


$admin=mysqli_query($con,"select * from tbladmin where adminTypeId = '2'");
$countAdmin=mysqli_num_rows($admin);

$todaysAtt=mysqli_query($con,"select * from tblattendance where date(DateTaken)=CURDATE();"); //today's Attendance
$countTodaysAttendance=mysqli_num_rows($todaysAtt);

$allAtt=mysqli_query($con,"select * from tblattendance");
$countAllAttendance=mysqli_num_rows($allAtt);

// //-------------------------------------------


$staffQuery=mysqli_query($con,"select * from tblstaff"); //staff
$countAllStaff = mysqli_num_rows($staffQuery);

$departmentQuery=mysqli_query($con,"select * from tbldepartment"); //department
$countDepartment = mysqli_num_rows($departmentQuery);

$programQuery=mysqli_query($con,"select * from tblprograms"); //programs
$countProgram = mysqli_num_rows($programQuery);

$studentQuery=mysqli_query($con,"select * from tblstudent"); //student
$countAllStudent = mysqli_num_rows($studentQuery);

$courseQuery=mysqli_query($con,"select * from tblcourse"); //courses
$countAllCourses = mysqli_num_rows($courseQuery);

$courseSession=mysqli_query($con,"select * from tblsession"); //courses
$countAllSession = mysqli_num_rows($courseSession);

$resultComputed=mysqli_query($con,"select * from tblfinalresult"); //courses
$countAllComputed = mysqli_num_rows($resultComputed);

$yearQue=mysqli_query($con,"select * from tblyear"); //courses
$countAllYear = mysqli_num_rows($yearQue);

$semesterQue=mysqli_query($con,"select * from tblsemester"); //courses
$countAllSemester = mysqli_num_rows($semesterQue);

$distinctno=mysqli_query($con,"SELECT * from tblfinalresult WHERE UnitAverage = 'Conditional'"); //dist. no.
$countAllDist = mysqli_num_rows($distinctno);

$uppercred=mysqli_query($con,"SELECT * from tblfinalresult WHERE UnitAverage = 'Upper Credit'"); //upper cred
$countAllUpc = mysqli_num_rows($uppercred);

$lowercred=mysqli_query($con,"SELECT * from tblfinalresult WHERE UnitAverage = 'Lower Credit'"); //lower cred
$countAlllc = mysqli_num_rows($lowercred);

$justpass=mysqli_query($con,"SELECT * from tblfinalresult WHERE UnitAverage = 'Pass'"); //just passed
$countAlljp = mysqli_num_rows($justpass);

$failed=mysqli_query($con,"SELECT * from tblfinalresult WHERE UnitAverage = 'Failed'"); //failed numbers
$countAllf = mysqli_num_rows($failed);


//-----------------------LECTURER----------------------

$lecCourse=mysqli_query($con,"select * from tblcourse where departmentId = '$departmentId'"); //courses
$countLecCourse = mysqli_num_rows($lecCourse);

$que=mysqli_query($con,"select * from tblassignedstaff where departmentId = '$departmentId'"); //assigned staff
$lecCountStaff = mysqli_num_rows($que);


//-----------------------STUDENT----------------------

$studCourse=mysqli_query($con,"select * from tblcourse where departmentId = '$departmentId'"); //courses
$coutAllStudentCourses = mysqli_num_rows($studCourse);

$queResult=mysqli_query($con,"select * from tblfinalresult where studentId = '$studentId'"); //assigned staff
$countAllStudResult = mysqli_num_rows($queResult);

?>