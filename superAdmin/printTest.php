<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
// session_start();
// include('includes/config.php');
ob_start();
// require_once('includes/configpdo.php');
error_reporting(0);

?>

<html>
<style>
body {
  padding: 4px;
  text-align: center;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}


</style>
    <h2><b>CAVITE STATE UNIVERSITY -  GENERAL TRIAS CITY CAMPUS</b></h2>
    <h4><b></b></h4>
<?php 
$query = mysql_query("select * from students where studentId='$_SESSION[alogin]'")or die(mysql_error());
while($rows = mysql_fetch_array($query)){
                  {  ?>
                  <div align="left">
<p><b>Student Name :</b> <?php echo $rows['surname'].' '.$rows['firstname'].' '.$rows['middleName'];?></p>
<p><b>Year:</b> <?php echo $rows['year'];?>
<p><b>Session:</b> <?php echo $rows['session'];?>
<p><b>Student ID:</b> <?php echo $rows['studentId'];?>
<p><b>Sex:</b> <?php echo $rows['sex'];?>
</div>

<?php 
}
?>    

    <h4><b>CLEARANCE FOR  <?php echo  $rows['session'].'  SESSION  '. $rows['year'].' YEAR';?></b></h4>
 <table class="table table-inverse" border="1">
                      
                                                <table class="table table-hover table-bordered">
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                        <th></th>
                                                            <th>Requirement</th>
                                                            <th>Student ID</th>
                                                            <th>Session</th>
                                                            <th>Year</th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php	
$query = mysql_query("select * from requploads where studentId='$_SESSION[alogin]' and session='$rows[session]' and year = '$rows[year]'")or die(mysql_error());
while($row = mysql_fetch_array($query)){
    $querys = mysql_query("select * from requirements where reqid='$row[reqId]'")or die(mysql_error());
while($rowss = mysql_fetch_array($querys)){
  $studentId = $row['studentId'];$sn=$sn+1;?>
<tr>
                        <td><?php echo $sn; ?>
                        <td><?php echo $rowss['reqName']?>
                        <td><?php echo $row['studentId']; ?></td>
                        <td><?php echo $row['session']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['uploadStatus']; ?></td>


</tr>
<?php $cnt=$cnt+1;}}}?>
                            </tbody>
                            </table>

                            </div>
</html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("Clearance.pdf");
?>