<?php
session_start();
include '../db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php
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
    $select2="SELECT * FROM teacher";
    $run2=mysqli_query($conn,$select2);
    while($row_user=mysqli_fetch_array($run2)){
        
        $teacher_id = $row_user['teacher_id'];
        $teacher_name = $row_user['teacher_name'];
        $date=date("Y-m-d");
        $select3="SELECT * FROM teacher_attendance where teacher_id='$teacher_id' and attendance_date='$date'";
        $run3=mysqli_query($conn,$select3);
        
        if($run3->num_rows==0){
            $sql="INSERT INTO `teacher_attendance` (`teacher_id`, `teacher_name`,`attendance_status`, `attendance_date`) VALUES ('$teacher_id','$teacher_name','Absent', CURRENT_DATE());";
            $result=mysqli_query($conn,$sql);
        
        }
    }         
?>
<?php
$a='';
 $sql="SELECT COUNT(student_id) from `student` ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $a.=$row_user['COUNT(student_id)'];
 }
 $b='';
 $sql="SELECT COUNT(teacher_id) from `teacher` ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $b.=$row_user['COUNT(teacher_id)'];
 }
 $c='';
 $sql="SELECT COUNT(course_id) from `courses` ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $c.=$row_user['COUNT(course_id)'];
 }
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="admin_dashboard.css">
  <title>Courses</title>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'admin_sidebar.php';?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Admin Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="Sufiyan Irfan.jpg" alt="">
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="big-box">

    <a href="admin_profile.php" style="text-decoration:none">
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

          <a href="view_student.php" style="text-decoration:none">
      <div class="box2">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/student.svg">
        </div>
        <div class="left-box">
      
        <h4>Students</h4>
        <h1><?php
            echo $a;
           
            ?></h1>
        </div>
      </div>
          </a>

          <a href="view_teacher.php" style="text-decoration:none">
      <div class="box3">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/teacher.svg">
        </div>
        <div class="left-box">
        <h4>Teachers</h4>
        <h1><?php
            echo $b;
            ?></h1>
        </div>
      </div>
          </a>

          <a href="acourses.php" style="text-decoration:none">
      <div class="box4">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/book.svg">
        </div>
        <div class="left-box">
        <h4>Courses</h4>
        <h1><?php
            echo $c;
            ?></h1>
        </div>
      </div>
 
          </a>


    <a href="add_student.php" style="text-decoration:none">
      <div class="box5">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/student.svg">
        </div>
        <div class="left-box">
          <h4>Add Student</h4>
        </div>
      </div>
    </a>

    <a href="add_teacher.php" style="text-decoration:none">
      <div class="box6">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/student.svg">
        </div>
        <div class="left-box">
          <h4>Add Teacher</h4>
        </div>
      </div>
    </a>

    <a href="admin_change_password.php" style="text-decoration:none">
      <div class="box7">
        <div class="right-box">
        <img class="sidebar-icon" src="../sidebar-icons/password.svg">
        </div>
        <div class="left-box">
          <h4>Change Password</h4>
        </div>
      </div>
    </a>

    <a href="admin_logout.php" style="text-decoration:none">
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
    <div class="area-box" id="areaContainer">
    </div>
    <div class="pie-box" id="pie2Container">
    </div>
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
       {  y: <?php echo $sp ?>, legendText: "Present", color: "#ffa703" }
       ]
     }
     ]
   });

    chart1.render();
  
  </script>

<script type="text/javascript">
window.onload = function () {
    var chart = new CanvasJS.Chart("areaContainer",
    {
	
    axisX:{
		valueFormatString: "DD-MMM" ,
				interval: 5,
				intervalType: "day",
				labelAngle: -50,
				labelFontColor: "LightSeaGreen",
        gridThickness: 0
    },
	axisY:{
        labelFontColor: "LightSeaGreen",
        gridThickness: 0
    },

    data: [
    {        
        type: "area",
		color:"RoyalBlue",
        dataPoints: [//array
        { x: new Date(2021, 07, 1), y: 4},
        { x: new Date(2021, 07, 4), y: 3},
        { x: new Date(2021, 07, 7), y: 5},
        { x: new Date(2021, 07, 10), y: 4},
        { x: new Date(2021, 07, 13), y: 8},
        { x: new Date(2021, 07, 16), y: 4},
        { x: new Date(2021, 07, 19), y: 6},
        { x: new Date(2021, 07, 22), y: 10},
        { x: new Date(2021, 07, 25), y: 9},
        { x: new Date(2021, 07, 28), y: 4},
        { x: new Date(2021, 07, 31), y: 7}

        ]
    }
    ]
});

    chart.render();
}
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
       {  y: <?php echo $tp ?>, legendText: "Present", color: "#ffa703" }
       ]
     }
     ]
   });

    chart1.render();
  
  </script>
</body>

</html>