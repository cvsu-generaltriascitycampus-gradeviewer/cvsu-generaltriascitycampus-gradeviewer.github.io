
<?php
include('dbconnection.php');
session_start(); 

if (isset($_SESSION['staffId']))
{
    $staffId = $_SESSION['staffId'];

}
else if(isset($_SESSION['staff_Id'])){

  $studentId = $_SESSION['staff_Id'];
}
else if(isset($_SESSION['studentId'])){

   $studentId = $_SESSION['studentId'];
}

else{
  echo "<script type = \"text/javascript\">
  window.location = (\"../index.php\");
  </script>";

}

?>