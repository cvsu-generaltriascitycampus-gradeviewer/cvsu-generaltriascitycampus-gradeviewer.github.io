
<?php
    $staff_Id = $_SESSION['staff_Id'];
    $query = mysqli_query($con,"SELECT * FROM tblstaff WHERE staff_Id='$staff_Id'");
    $row = mysqli_fetch_array($query);
    if($row){
        $fullName = $row['firstName'].' '.$row['lastName'];
    
    }
 

?>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if(!empty($fullName)) { ?>
                    <li class="menu-title">Staff:&nbsp;<?php echo $fullName; ?></li>
                    <?php  } ?>
                    
                    <li class="menu-title">Results and Grading</li>
                      <li class="menu-item-has-children dropdown <?php if($page=='result'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Result</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="studentList.php">Input Grade</a></li>
                            <li><i class="fa fa-plus"></i> <a href="studentList2.php">Unit Average</a></li>
                            <li><i class="fa fa-plus"></i> <a href="studentList3.php">View/Print Result</a></li>                     
                            <li><i class="fa fa-plus"></i> <a href="gradingCriteria.php">Grading Criteria</a></li>

                        </ul>
                    </li>
                                   
                    
                         <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>