<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'db_connection.php';
    if(isset($_POST['admin'])){
      $name = $_POST['name'];
      $password = $_POST['password'];
      $sql="SELECT * FROM `admin` WHERE name='$name' AND password='$password'";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);     
      if($num==1){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['name']=$name;
        header('Location:admin/admin_dashboard.php');
        exit;
      }      
    } 

    if(isset($_POST['teacher'])){
      $teacher_id = $_POST['teacher_id'];
      $password = $_POST['password'];
      $sql="SELECT * FROM `teacher` WHERE teacher_id='$teacher_id' AND password='$password'";
      $result=mysqli_query($conn,$sql);

      $row_user=mysqli_fetch_assoc($result);
      $teacher_name=$row_user['teacher_name'];

      $num=mysqli_num_rows($result);     
      if($num==1){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['teacher_id']=$teacher_id;
        $_SESSION['teacher_name']=$teacher_name;
        header('Location:teacher/teacher_dashboard.php');
        exit;
      } 
    } 

    if(isset($_POST['student'])){
      $student_id = $_POST['student_id'];
      $password = $_POST['password'];
      $sql="SELECT * FROM `student` WHERE student_id='$student_id' AND password='$password'";
      $result=mysqli_query($conn,$sql);

      $row_user=mysqli_fetch_assoc($result);
      $student_name=$row_user['student_name'];


      $num=mysqli_num_rows($result);     
      if($num==1){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['student_id']=$student_id;
        $_SESSION['student_name']=$student_name;
        header('Location:student/student_dashboard.php');
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
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="container">
    <div class="contact-form">
      <img src="admin.png">
      <form method="post" action="" autocomplete="off">
        <h3 class="title">Admin Login</h3>
        <div class="input-container">
          <input type="text" name="name" class="input" required />
          <label for="">Username</label>
          <span>Username</span>
        </div>
        <div class="input-container">
          <input type="password" name="password" class="input" required />
          <label for="">Password</label>
          <span>Password</span>
        </div>
        <input type="submit" name="admin" value="Login" class="btn" />
      </form>
    </div>
    <div class="contact-form">
      <img src="teacher.png">
      <form method="post" action="" autocomplete="off">
        <h3 class="title">Teacher Login</h3>
        <div class="input-container">
          <input type="text" name="teacher_id" class="input" required />
          <label for="">Username</label>
          <span>Username</span>
        </div>
        <div class="input-container">
          <input type="password" name="password" class="input" required />
          <label for="">Password</label>
          <span>Password</span>
        </div>
        <input type="submit" name="teacher" value="Login" class="btn" />
      </form>
    </div>
    <div class="contact-form">
      <img src="student.png">
      <form method="post" action="" autocomplete="off">
        <h3 class="title">Student Login</h3>
        <div class="input-container">
          <input type="text" name="student_id" class="input" required />
          <label for="">Username</label>
          <span>Username</span>
        </div>
        <div class="input-container">
          <input type="password" name="password" class="input" required />
          <label for="">Password</label>
          <span>Password</span>
        </div>
        <input type="submit" name="student" value="Login" class="btn" />
      </form>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>