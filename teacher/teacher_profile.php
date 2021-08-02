<?php 
session_start();
include 'teacher_sidebar.php';
include '../db_connection.php';
$teacher_id=$_SESSION['teacher_id'];
$select="SELECT * FROM teacher where teacher_id='$teacher_id' ";
$run=mysqli_query($conn,$select);
$row_user=mysqli_fetch_array($run);
  
  $teacher_name=$row_user['teacher_name'];
  $teacher_image=$row_user['teacher_image'];
  $email=$row_user['email'];
  $phone=$row_user['phone'];
  $address=$row_user['address'];
  $courses_teaching=$row_user['courses_teaching'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="teacher_dashboard.css">
  <link rel="stylesheet" href="teacher_profile.css">
</head>

<body>             
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Teacher Profile</span>
      </div>

      <div class="profile-details">
      <img src="../teacher_images/<?php echo $teacher_image;?>">
        <span class="admin_name">
          <?php echo $teacher_name?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="container">
      <div class="card1">
      <img class="admin-profile-img" src="../teacher_images/<?php echo $teacher_image;?>">
       
        <p class="name">
          <?php echo $teacher_name?>
        <p>
        <a href="edit_teacher.php?teacher_id=<?php echo $_SESSION['teacher_id'];?>"><input type="submit" class="edit-btn" name="edit" value="Edit Profile"></a>
      </div>
      <div class="card2">
        <table style="width:90%">
          <tr>
            <th>Teacher ID</th>
            <td>
              <?php echo $teacher_id?>
            </td>
          </tr>
        
          <tr>
            <th>Full Name</th>
            <td>
              <?php echo $teacher_name?>
            </td>
          </tr>

          <tr>
            <th>Email</th>
            <td>
              <?php echo $email?>
            </td>
          </tr>

          <tr>
            <th>Phone</th>
            <td>
              <?php echo $phone?>
            </td>
          </tr>

          <tr>
            <th>Address</th>
            <td>
              <?php echo $address?>
            </td>
          </tr>

        </table>


      </div>
      <div class="card3">
        <a href="#"><img class="icons" src="../social-media-regular-icons/globe.svg"></a><span class="icons-name">Website</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/github.svg"></a><span class="icons-name">Github</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/twitter.svg"></a><span class="icons-name">Twitter</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/instagram.svg"></a><span class="icons-name">Instagram</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/facebook.svg"></a><span class="icons-name">Facebook</span>
        
      </div>
      <div class="card4">
       <h3>Courses Teaching</h3>
       <?php 
                    $exp=explode(",",$courses_teaching);
                    for($i=0;$i<count($exp);$i++)
                    { 
                      echo '<label>'.($i+1).' '.$exp[$i].'</label>';
                    }
      ?>
       
    
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
  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        "pagingType": "full_numbers"
      });
    });
  </script>
</body>

</html>