
<?php
    $staffId = $_SESSION['staffId'];
    $query = mysqli_query($con,"SELECT * FROM tbladmin WHERE staffId='$staffId'");
    $row = mysqli_fetch_array($query);
if($row){
    $staffFullName = $row['firstName'].' '.$row['lastName'];
}

?>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <?php if(!empty($fullName)) { ?>
                <li class="menu-title">ADMIN: &nbsp;&nbsp;&nbsp;<?php echo $staffFullName;?></li>
                <?php  } ?>
                        <li class="menu-title">School Year</li>
                 <li class="menu-item-has-children dropdown <?php if($page=='session'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>School Year</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="createSession.php">Add New School Year</a></li>
                    </ul>
                </li>
             
                   <li class="menu-title">Programs and Department</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='Program'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Programs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createProgram.php">Add New Program</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewProgram.php">View Programs</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown <?php if($page=='department'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Departments</a>
                        <ul class="sub-menu children dropdown-menu">
        
                            <li><i class="fa fa-eye"></i> <a href="viewDepartment.php">View Department</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Students</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='student'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Student</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createStudent.php">Add New Student</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewStudent.php">View Student</a></li>
                        </ul>
                    </li>

                    

                     <li class="menu-item-has-children dropdown <?php if($page=='courses'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Courses</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createCourses.php">Add New Course</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewCourses.php">View Courses</a></li>
                        </ul>
                    </li>
                

                    <li class="menu-title">Account</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='profile'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-key"></i> <a href="changePassword.php">Change Password</a></li>
                            <li><i class="menu-icon fa fa-user"></i> <a href="updateProfile.php">Update Profile</a></li>
                            </li>
                        </ul>
                         <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>