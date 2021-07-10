<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php

$a=$_SESSION['teacher_name'];
fopen("teacher_attendance_record/".$a.".txt", "a") or die("Unable to open file!");  

if(file_get_contents("teacher_attendance_record/".$a.".txt")){
  include '../db_connection.php';
  $teacher_id=$_SESSION['teacher_id'];
  $teacher_name=$_SESSION['teacher_name'];
  $sql="INSERT INTO `teacher_attendance` (`teacher_id`, `teacher_name`, `attendance_date`) VALUES ('$teacher_id','$teacher_name', CURRENT_DATE());";
  $result=mysqli_query($conn,$sql);

    unlink("teacher_attendance_record/".$a.".txt");
    echo $a." attendance has been marked successfully";
    header("Refresh:5");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="teacher_dashboard.css">
    <link rel="stylesheet" href="teacher_sidebar.css">
</head>
<body>
    <?php include 'teacher_sidebar.php';?>
    
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Teacher Dashboard</span>
      </div>
     
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name"><?php echo $_SESSION['teacher_name'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <section>
  
    <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

    
</body>
</html>