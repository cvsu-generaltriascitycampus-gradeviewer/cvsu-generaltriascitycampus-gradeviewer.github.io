
<?php

    $query = mysqli_query($con,"SELECT * FROM tblstudent WHERE studentId='$studentId'");
    $row = mysqli_fetch_array($query);
    if($row){
        $fullName = $row['firstName'].' '.$row['lastName'];
        $departmentId = $row['departmentId'];
        $programId = $row['programId'];
        $yearId = $row['yearId'];
    }
 

?>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if(!empty($fullName)) { ?>
                    <li class="menu-title">Student:&nbsp;<?php echo $fullName; ?></li>
                    <?php  } ?>
                    
                    <li class="menu-item-has-children dropdown <?php if($page=='courses'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Courses</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-eye"></i><a href="studentCourses.php">View Courses</a></li>
                        </ul>
                    </li>

                     <li class="menu-item-has-children dropdown <?php if($page=='result'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Result</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-eye"></i> <a href="studentResult.php"> View Result</a></li>
                             <li><i class="fa fa-eye"></i> <a href="gradingCriteria.php"> Grading Criteria</a></li>
                        </ul>
                    </li>
                                   
                    <li class="menu-item-has-children dropdown <?php if($page=='profile'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="changePassword.php">Change Password</a></li> 
                            </li>
                        </ul>
                         <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>