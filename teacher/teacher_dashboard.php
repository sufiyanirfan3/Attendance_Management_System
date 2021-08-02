<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php
    include '../db_connection.php';
    
    $select="SELECT * FROM teacher";
    $run=mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){
        
        $teacher_id = $row_user['teacher_id'];
        $teacher_name = $row_user['teacher_name'];
        $date=date("Y-m-d");
        $select1="SELECT * FROM teacher_attendance where teacher_id='$teacher_id' and attendance_date='$date'";
        $run1=mysqli_query($conn,$select1);
        
        
        if($run1->num_rows==0){
            $sql="INSERT INTO `teacher_attendance` (`teacher_id`, `teacher_name`,`attendance_status`, `attendance_date`) VALUES ('$teacher_id','$teacher_name','Absent', CURRENT_DATE());";
            $result=mysqli_query($conn,$sql);
         
        }
    }         
?>
<?php

$a=$_SESSION['teacher_name'];
fopen("teacher_attendance_record/".$a.".txt", "a") or die("Unable to open file!");  

if(file_get_contents("teacher_attendance_record/".$a.".txt")){
  include '../db_connection.php';
  $teacher_id=$_SESSION['teacher_id'];
  $teacher_name=$_SESSION['teacher_name'];

  $sql="UPDATE `teacher_attendance` SET `teacher_id`='$teacher_id', `teacher_name`='$teacher_name',`attendance_status`='Present', `attendance_date`=CURRENT_DATE() where `teacher_id`='$teacher_id'" ;
  $result=mysqli_query($conn,$sql);

    unlink("teacher_attendance_record/".$a.".txt");
    include '../alert.php';
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
      <img src="../teacher_images/<?php echo $_SESSION['teacher_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['teacher_name'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
<div class="main-container">
    <div class="big-box">

    <a href="teacher_profile.php" style="text-decoration:none">
      <div class="box1">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/admin.svg">
        </div>
        <div class="left-box">
            <h4>Profile</h4>      
        </div>
      </div>
          </a>
          <a href="edit_teacher.php?teacher_id=<?php echo $_SESSION['teacher_id'];?>" style="text-decoration:none">
      <div class="box2">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/student.svg">
        </div>
        <div class="left-box">
        <h4>Edit Profile</h4>   
        </div>
      </div>
          </a>

          <a href="tcourses.php" style="text-decoration:none">
      <div class="box3">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/teacher.svg">
        </div>
        <div class="left-box">
        <h4>Courses Offered</h4> 
        </div>
      </div>
          </a>

          <a href="teacher_mark_attendance.php" style="text-decoration:none">
      <div class="box4">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/book.svg">
        </div>
        <div class="left-box">
        <h4>Mark Attendance</h4> 
        </div>
      </div>
          </a>


    <a href="view_attendance.php" style="text-decoration:none">
      <div class="box5">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/student.svg">
        </div>
        <div class="left-box">
          <h4>View Attendance</h4>
        </div>
      </div>
    </a>

    <a href="view_student_attendance.php" style="text-decoration:none">
      <div class="box6">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/student.svg">
        </div>
        <div class="left-box">
          <h4>Student Attendance</h4>
        </div>
      </div>
    </a>

    <a href="teacher_change_password.php" style="text-decoration:none">
      <div class="box7">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/password.svg">
        </div>
        <div class="left-box">
          <h4>Change Password</h4>
        </div>
      </div>
    </a>
        
    <a href="teacher_logout.php" style="text-decoration:none">
      <div class="box8">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/logout.svg">
        </div>
        <div class="left-box">
          <h4>Logout</h4>
        </div>
      </div>
    </a>

    </div>


    <div class="second-box">
    <div class="pie-box" id="pie1Container">
    </div>
    <div class="pie-box" id="pie2Container">
    </div>
    </div>
    </div>
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
<?php
$sa='';
 $sql="SELECT COUNT(attendance_status) from `student_attendance` where attendance_status='Absent' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $sa.=$row_user['COUNT(attendance_status)'];
 }
 $sp='';
 $sql="SELECT COUNT(attendance_status) from `student_attendance` where attendance_status='Present' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $sp.=$row_user['COUNT(attendance_status)'];
 }
 ?>
 <?php
$ta='';
 $sql="SELECT COUNT(attendance_status) from `teacher_attendance` where attendance_status='Absent' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $ta.=$row_user['COUNT(attendance_status)'];
 }
 $tp='';
 $sql="SELECT COUNT(attendance_status) from `teacher_attendance` where attendance_status='Present' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $tp.=$row_user['COUNT(attendance_status)'];
 }
 ?>
  <script type="text/javascript">

var chart1 = new CanvasJS.Chart("pie1Container",
{
  subtitles: [{
text: "Student Attendance",
fontSize: 18
}],
  legend: {
    horizontalAlign: "right",
    verticalAlign: "center"
  },
  data: [
  {
   color: "LightSeaGreen",
   indexLabelPlacement: "outside",
   showInLegend: true,
   type: "doughnut",
   dataPoints: [
   {  y: <?php echo $sa ?>, legendText: "Absent", color: "RoyalBlue" },
   {  y: <?php echo $sp ?>, legendText: "Present", color: "#1abc9c" }
   ]
 }
 ]
});

chart1.render();

</script>
<script type="text/javascript">

    var chart1 = new CanvasJS.Chart("pie2Container",
    {subtitles: [{
		text: "Teacher Attendance",
    fontSize: 18
	}],
      legend: {
        horizontalAlign: "right",
        verticalAlign: "center"
      },
      data: [
      {
       color: "LightSeaGreen",
       indexLabelPlacement: "outside",
       showInLegend: true,
       type: "doughnut",
       dataPoints: [
       {  y: <?php echo $ta ?>, legendText: "Absent", color: "RoyalBlue" },
       {  y: <?php echo $tp ?>, legendText: "Present", color: "#1abc9c"}
       ]
     }
     ]
   });

    chart1.render();
  
  </script>
</body>
</html>