<?php 
session_start();
include 'admin_sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="admin_dashboard.css">
  <link rel="stylesheet" href="admin_profile.css">
</head>

<body>             
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Admin Profile</span>
      </div>

      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="container">
      <div class="card1">
        <img class="admin-profile-img" src="../team1.jpg">
        <p class="name">
          <?php echo $_SESSION['admin_name']?>
        <p>
        <input type="submit" class="edit-btn" name="edit" value="Edit Profile">
      </div>
      <div class="card2">
        <table style="width:90%">
          <tr>
            <th>Admin ID</th>
            <td>
              <?php echo $_SESSION['admin_id']?>
            </td>
          </tr>
        
          <tr>
            <th>Full Name</th>
            <td>
              <?php echo $_SESSION['admin_name']?>
            </td>
          </tr>

          <tr>
            <th>Email</th>
            <td>
              <?php echo $_SESSION['email']?>
            </td>
          </tr>

          <tr>
            <th>Phone</th>
            <td>
              <?php echo $_SESSION['phone']?>
            </td>
          </tr>

          <tr>
            <th>Address</th>
            <td>
              <?php echo $_SESSION['address']?>
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
       <h3>Skills</h3>
       <label>Communication</label>
       <progress min="0" max="100" value="90"></progress>
       <label>Responsibility</label>
       <progress min="0" max="100" value="75"></progress>
       <label>Time Management</label>
       <progress min="0" max="100" value="85"></progress>
       <label>Multi tasking</label>
       <progress min="0" max="100" value="65"></progress>
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