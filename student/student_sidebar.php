<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="student_sidebar.css">
    <link rel="stylesheet" href="student_dashboard.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Attendee</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="student_dashboard.php" class="active">
          <img class="sidebar-icon" src="../sidebar-icons/dashboard.svg">
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="student_profile.php">
          <img class="sidebar-icon" src="../sidebar-icons/user.svg">
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="scourses.php">
          <img class="sidebar-icon" src="../sidebar-icons/course.svg">
            <span class="links_name">Courses Offered</span>
          </a>
        </li>
        <li>
          <a href="student_mark_attendance.php">
          <img class="sidebar-icon" src="../sidebar-icons/mark.svg">           
            <span class="links_name">Mark Attendance</span>
          </a>
        </li>
        <li>
          <a href="view_attendance.php">
          <img class="sidebar-icon" src="../sidebar-icons/attendance.svg">
            <span class="links_name">View Attendence</span>
          </a>
        </li>
        <li>
          <a href="student_change_password.php">
          <img class="sidebar-icon" src="../sidebar-icons/password.svg">
            <span class="links_name">Change Password</span>
          </a>
        </li>
            
        <li class="log_out">
          <a href="student_logout.php">
          <img class="sidebar-icon" src="../sidebar-icons/logout.svg">
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  



</body>
</html>

