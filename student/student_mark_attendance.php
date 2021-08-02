<?php
session_start();
include "../db_connection.php";
$student_id=$_SESSION['student_id'];
$select="SELECT attendance_date,attendance_status FROM student_attendance WHERE student_id='$student_id'";
$run=mysqli_query($conn,$select);
while($row_user=mysqli_fetch_array($run)){
    $date= $row_user['attendance_date'];
    $status= $row_user['attendance_status'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="student_mark_attendance.css">
</head>
<body>
<script> 
function open_script(){ 
   window.location.assign('smark_attendance.php');
} 
</script> 
<div class="container">
<div class="card1">
    <img class="face-img" src="facerecognition1.gif">
    </div>
    <div class="card2">
<input class="mark-btn" type="button" value="Mark Attendance" <?php if ($date == date("Y-m-d") && $status=="Present"){ ?> disabled <?php   } ?> onclick="open_script()" />
<a href="student_dashboard.php"><input type="image" class="home-img" src="../home.svg" width=36px height=36px></a>
</div>
</div>

</body>
</html>