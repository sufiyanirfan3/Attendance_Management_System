<?php
session_start();
include '../db_connection.php';
include 'admin_sidebar.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '../db_connection.php';
    if(isset($_POST['student'])){
        $student_id = $_POST['student_id'];
        $student_name=$_POST['student_name'];

        $student_image=$_FILES['student_image']['name'];
        $temp_name=$_FILES['student_image']['tmp_name'];

        $password = $_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $courses_enrolled= implode(',',$_POST['courses_enrolled']);
        $sql="INSERT INTO `student`(`student_id`,`student_name`,`student_image`, `password`,`email`,`phone`,`courses_enrolled`) VALUES ('$student_id','$student_name','$student_image',MD5('$password'),'$email','$phone','".$courses_enrolled."')";
        // for($i=0;$i<count($checkbox);$i++)
        //     $sql.="('".$checkbox[$i]."')";
        // $sql=rtrim($sql,',')
        $result=mysqli_query($conn,$sql); 
        if($result){
          move_uploaded_file($temp_name,"../student_images/$student_image");
          header('Location:add_student.php');
          exit;
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_student.css">
    <link rel="stylesheet" href="admin_dashboard.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Add Student</span>
      </div>

      <div class="profile-details">
      <img src="Zunaira Hasnain.jpg">
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>
    <div class="container">
        <div class="title">
            Add Student
        </div>
        <form class="form" method="post" action="" autocomplete="off" enctype="multipart/form-data">


            <div class="inputfield">
                <label for="">Student ID</label>
                <input type="text" name="student_id" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Student Name</label>
                <input type="text" name="student_name" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Student Image</label>
                <input type="file" name="student_image" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Password</label>
                <input type="password" name="password" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" required />
            </div>


            <div class="container1">
                <div class="title1">
                    Select Courses
                </div>
                <ul class="group">

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Web Development" id="Web Development" />
                        <label for="Web Development">Web Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Artifical Intelligence"
                            id="Artifical Intelligence" />
                        <label for="Artifical Intelligence">Artifical Intelligence</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Cloud Computing" id="Cloud Computing" />
                        <label for="Cloud Computing">Cloud Computing</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Graphics Designing"
                            id="Graphics Designing" />
                        <label for="Graphics Designing">Graphics Designing</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Robotics" id="Robotics" />
                        <label for="Robotics">Robotics</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Game Development"
                            id="Game Development" />
                        <label for="Game Development">Game Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Crypto Currency" id="Crypto Currency" />
                        <label for="Crypto Currency">Crypto Currency</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Cyber Security" id="Cyber Security" />
                        <label for="Cyber Security">Cyber Security</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Mobile App Development"
                            id="Mobile App Development" />
                        <label for="Mobile App Development">Mobile App Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Data Science" id="Data Science" />
                        <label for="Data Science">Data Science</label>
                    </li>

                </ul>
            </div>
            <input type="submit" name="student" value="SAVE" class="btn" />
        </form>

        
    </div>
</section>
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
</body>

</html>