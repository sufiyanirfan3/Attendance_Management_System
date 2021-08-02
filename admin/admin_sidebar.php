<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin_sidebar.css">
    <link rel="stylesheet" href="admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
    <input type="image" style="filter:invert(1);margin-left:15px;margin-right:20px;"src="../sidebar-icons/face-recognition.svg" width=30px height=30px>
      <span class="logo_name">Attendee</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin_dashboard.php" class="active">
            <img class="sidebar-icon" src="../sidebar-icons/dashboard.svg">
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin_profile.php">
          <img class="sidebar-icon" src="../sidebar-icons/user.svg">
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="acourses.php">
          <img class="sidebar-icon" src="../sidebar-icons/course.svg">
            <span class="links_name">Courses</span>
          </a>
        </li>   
        <li>
          <a href="view_student.php">
          <img class="sidebar-icon" src="../sidebar-icons/student.svg">
            <span class="links_name">Student</span>
          </a>
        </li>
        <li>
          <a href="view_student_attendance.php">
          <img class="sidebar-icon" src="../sidebar-icons/attendance.svg">
            <span class="links_name">Student Attendence</span>
          </a>
        </li>  
        <li>
          <a href="view_teacher.php">
          <img class="sidebar-icon" src="../sidebar-icons/teacher.svg">
            <span class="links_name">Teacher</span>
          </a>
        </li>
        <li>
          <a href="view_teacher_attendance.php">
          <img class="sidebar-icon" src="../sidebar-icons/attendance.svg">
            <span class="links_name">Teacher Attendence</span>
          </a>
        </li>
        <li>
          <a href="admin_change_password.php">
          <img class="sidebar-icon" src="../sidebar-icons/password.svg">
            <span class="links_name">Change Password</span>
          </a>
        </li>    
        <li class="log_out">
          <a href="admin_logout.php">
          <img class="sidebar-icon" src="../sidebar-icons/logout.svg">
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
</body>
</html>

