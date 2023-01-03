<?php


// -------------------------- Score Grade Point -------------------------

function getScoreGradePoint($score){

    $gradePoint = "";

     if($score >= 96.7 && $score <= 100)
     {
        $gradePoint = 1.00;
     }
     else if($score >= 93.4 && $score <= 96.6){
        $gradePoint = 1.25;
     }
     else if($score >= 90.1 && $score <= 93.3){
        $gradePoint = 1.50;
     }
     else if($score >= 86.7 && $score <= 90.0){
         $gradePoint = 1.75;
     }
     else if($score >= 83.4 && $score <= 86.6){
        $gradePoint = 2.00;
     }
      else if($score >= 80.1 && $score <= 83.3){
        $gradePoint = 2.25;
     }
      else if($score >= 76.7 && $score <= 80.0){
        $gradePoint = 2.50;
     }
     else if($score >= 73.4 && $score <= 76.6){
        $gradePoint = 2.75;
     }
     else if($score <= 70.0 && $score <= 73.3){
         $gradePoint = 3.00;
     }
     else if($score <= 50.0 && $score <= 69.9){
      $gradePoint = 4.00;
     }
     else if($score <= 49.9){
      $gradePoint = 5.00;
     }

     return $gradePoint;
}

// -------------------------- Class of Diploma -------------------------

function getUnitAverage($gpa){

    $UnitAverage = "";

     if($gpa >= 1.00)
     {
        $UnitAverage = "Pass";
     }
     else if($gpa >= 1.25){
        $UnitAverage = "Pass";
     }
     else if($gpa >= 1.50){
       $UnitAverage = "Pass";
     }
     else if($gpa >= 1.75 ){
         $UnitAverage = "Pass";
     }
     else if($gpa >= 2.00){
      $UnitAverage = "Upper Credit";
     }
     else if($gpa >= 2.25){
        $UnitAverage = "Upper Credit";
     }
     else if($gpa >= 2.50){
      $UnitAverage = "Lower Credit";
     }
     else if($gpa >= 2.75){
      $UnitAverage = "Lower Credit";
     }
     else if($gpa >= 3.00){
      $UnitAverage = "Lower Credit";
     }
     else if($gpa >= 4.00){
      $UnitAverage = "Conditional";
     }
     else if($gpa >= 5.00){
      $UnitAverage = "Failed";
     }

     return $UnitAverage;
}


?>
