<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php
    include '../db_connection.php';
    $select="SELECT * FROM student";
    $run=mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){
        
        $student_id = $row_user['student_id'];
        $student_name = $row_user['student_name'];
        $date=date("Y-m-d");
        $select1="SELECT * FROM student_attendance where student_id='$student_id' and attendance_date='$date'";
        $run1=mysqli_query($conn,$select1);
        
        
        if($run1->num_rows==0){
            $sql="INSERT INTO `student_attendance` (`student_id`, `student_name`,`attendance_status`, `attendance_date`) VALUES ('$student_id','$student_name','Absent', CURRENT_DATE());";
            $result=mysqli_query($conn,$sql);
            
        }
    }         

?>
<?php

$a=$_SESSION['student_name'];
fopen("student_attendance_record/".$a.".txt", "a") or die("Unable to open file!");  

if(file_get_contents("student_attendance_record/".$a.".txt")){
  include '../db_connection.php';
  $student_id=$_SESSION['student_id'];
  $student_name=$_SESSION['student_name'];


  $sql="UPDATE `student_attendance` SET `student_id`='$student_id', `student_name`='$student_name',`attendance_status`='Present', `attendance_date`=CURRENT_DATE() where `student_id`='$student_id'" ;
  $result=mysqli_query($conn,$sql);

    unlink("student_attendance_record/".$a.".txt");
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
    <link rel="stylesheet" href="student_dashboard.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
    <?php include 'student_sidebar.php';?>
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Student Dashboard</span>
      </div>
     
      <div class="profile-details">
      <img src="../student_images/<?php echo $_SESSION['student_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['student_name'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <section>
    <div class="main-container">
    <div class="big-box">

    <a href="" style="text-decoration:none">
      <div class="box1">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/admin.svg">
        </div>
        <div class="left-box">
            <h4>Admins</h4>
            <h1>
            <?php
            $sql="SELECT COUNT(admin_id) from `admin` ";
            $run=mysqli_query($conn,$sql);
            while($row_user=mysqli_fetch_array($run)){
              echo $row_user['COUNT(admin_id)'];
            }
            ?>
            </h1>
        </div>
      </div>
          </a>

          <a href="student_profile.php" style="text-decoration:none">
      <div class="box2">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/user.svg">
        </div>
        <div class="left-box">  
        <h4>Profile</h4>
        </div>
      </div>
          </a>

          <a href="scourses.php" style="text-decoration:none">
      <div class="box3">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/book.svg">
        </div>
        <div class="left-box">
        <h4>Courses</h4>
        </div>
      </div>
          </a>

          <a href="view_attendance.php" style="text-decoration:none">
      <div class="box4">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/attendance.svg">
        </div>
        <div class="left-box">
        <h4>View Attendance</h4>
        </div>
      </div>
 
          </a>


    <a href="student_change_password.php" style="text-decoration:none">
      <div class="box5">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/password.svg">
        </div>
        <div class="left-box">
          <h4>Change Password</h4>
        </div>
      </div>
    </a>

    <a href="student_logout.php" style="text-decoration:none">
      <div class="box6">
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
    <div class="facial-img">
      <a href="student_mark_attendance.php"><img class='fimg'src="facerecognition.gif"></a>
    </div>
    <div class="pie-box" id="pie1Container">
    </div>
    
    </div>

    </div>
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
$student_id = $_SESSION['student_id'];
$sa='';
 $sql="SELECT COUNT(attendance_status) from `student_attendance` where student_id='$student_id' and attendance_status='Absent' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $sa.=$row_user['COUNT(attendance_status)'];
 }
 $sp='';
 $sql="SELECT COUNT(attendance_status) from `student_attendance` where student_id='$student_id' and attendance_status='Present' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $sp.=$row_user['COUNT(attendance_status)'];
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
</body>
</html>