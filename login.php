<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'db_connection.php';
    if(isset($_POST['admin'])){
      $admin_id = $_POST['admin_id'];
      $password = $_POST['password'];
      $sql="SELECT * FROM `admin` WHERE admin_id='$admin_id' AND password='$password'";
      $result=mysqli_query($conn,$sql);

      $row_user=mysqli_fetch_assoc($result);
      $admin_name=$row_user['admin_name'];
      $email=$row_user['email'];
      $phone=$row_user['phone'];
      $address=$row_user['address'];

      $num=mysqli_num_rows($result);     
      if($num==1){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['admin_id']=$admin_id;
        $_SESSION['admin_name']=$admin_name;
        $_SESSION['email']=$email;
        $_SESSION['phone']=$phone;
        $_SESSION['address']=$address;
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
      $teacher_image=$row_user['teacher_image'];

      $num=mysqli_num_rows($result);     
      if($num==1){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['teacher_id']=$teacher_id;
        $_SESSION['teacher_name']=$teacher_name;
        $_SESSION['teacher_image']=$teacher_image;
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
      $student_image=$row_user['student_image'];


      $num=mysqli_num_rows($result);     
      if($num==1){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['student_id']=$student_id;
        $_SESSION['student_name']=$student_name;
        $_SESSION['student_image']=$student_image;
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
      <div class="profile-login-img"><img src="admin.png"></div>
      <form method="post" action="" autocomplete="off">
        <h3 class="title">Admin Login</h3>
        <div class="input-container">
          <input type="text" name="admin_id" class="input" required />
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
      <div class="profile-login-img"><img src="teacher.png"></div>
      
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
      <div class="profile-login-img"><img src="student.png"></div>
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