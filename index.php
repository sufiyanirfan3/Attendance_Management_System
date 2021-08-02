<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connection.php';
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];  
      $sql="INSERT INTO `contact_form` (`name`, `email`, `message`,`date`) VALUES ('$name', '$email','$message',current_timestamp())";
      $result=mysqli_query($conn,$sql);
      if($result){
        header('Location:index.php');
        exit;
      }  
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  </head>
  <body>

    <div class="scrollToTop-btn">
      <i class="fas fa-angle-up"></i>
    </div>

    <header>
      <a href="#" class="brand">Attendee</a>

      <div class="menu-btn"></div>
      <div class="navigation">
        <a href="#main">Home</a>
        <a href="#about">About</a>
        <a href="#languages">Languages</a>
        <a href="#developers">Developers</a>
        <a href="#contact">Contact</a>
        <a href="login.php">Login</a>       
        <img src="frontend-images/moon.svg" id="icon">
        <span id="main-span">
          <img src="frontend-images/palette.svg" id="icon">
          <ul>
            <li class="colors" id="green" data-color="#1abc9c" ></li>
            <li class="colors" id="blue" data-color="#0056d2" ></li>
            <li class="colors" id="purple" data-color="#9b59b6" ></li>
            <li class="colors" id="pink" data-color="#ff7ba7" ></li>
            <li class="colors" id="yellow" data-color="#f1c40f" ></li>
            <li class="colors" id="red" data-color="#e74c3c" ></li>
            <li class="colors" id="orange" data-color="#e67e22" ></li>
          </ul>
        </span>
      </div>
    </header>

    <section class="main" id="main">
      <div class="content">
        <div class="column col-left reveal">
          <h2 class="content-title">Welcome to <b>Attendee !!</b></h2>
          <p class="paragraph-text">Attendee is a Facial Attendance Management System</p>
          <a href="#about" class="btn">Read More</a>
          <a href="login.php" class="btn">Login</a>
        </div>
        <div class="column col-right reveal">
          <div class="img-card">
            <img src="frontend-images/hero-banner.png" alt="">
          </div>
        </div>
        
      </div>
    </section>

    <section class="about" id="about">
      <div class="title reveal">
        <h2 class="section-title">About</h2>
      </div>
      <div class="content">
        <div class="column col-left reveal">
          <div class="img-card">
            <img src="frontend-images/facial.gif" alt="">
          </div>
        </div>
        <div class="column col-right reveal">
          <h2 class="content-title">Attendance Management System</h2>
          <p class="paragraph-text">This web application will facilitate institutions and help the teachers, improve and organize the process of taking, tracking and managing attendance of students. This application will provide facilities for the automated attendance of students using live face recognition to recognize each individual and mark their attendance automatically and utilizes video and image processing to provide inputs to the system. Facility of marking attendance manually will also be provided. </p>
          <a href="#languages" class="btn">See More</a>
        </div>
      </div>
    </section>

    <section class="languages" id="languages">
      <div class="title reveal">
          <h2 class="section-title">Languages</h2>
      </div>
      <div class="content">
        <div class="card reveal"><div class="languages-img">

          <img src="languages_images/html.svg" width=200px height=200px></div></div>
        <div class="card reveal"><div class="languages-img">

          <img src="languages_images/css.svg" width=200px height=200px></div></div>
        <div class="card reveal"><div class="languages-img">
 
          <img src="languages_images/js.png" width=200px height=200px></div></div>
        <div class="card reveal"><div class="languages-img">
      
          <img src="languages_images/tensorflow.png" width=200px height=200px></div></div>
        <div class="card reveal"><div class="languages-img">

         <img src="languages_images/php.svg" width=200px height=200px></div></div>
        <div class="card reveal"><div class="languages-img">

          <img src="languages_images/mysql.png" width=200px height=200px></div></div>
      </div>
    </section>

    <section class="developers" id="developers">
      <div class="title reveal">
        <h2 class="section-title">Team</h2>
      
      </div>
      <div class="content">
        <div class="card reveal">
          <div class="developers-img">
            <img src="frontend-images/Sufiyan Irfan.jpg" width=300px height=300px>
          </div>
          <div class="info">
            <h3>Sufiyan Irfan</h3>
            <p>Software Engineering Student @ NED University of Engineering & Technology</p>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/facebook.svg"></a>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/github.svg"></a>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/instagram.svg"></a>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/twitter.svg"></a>
          </div>
        </div>
        <div class="card reveal">
          <div class="developers-img">
            <img src="frontend-images/Sumaiya Inayat.jpg" width=300px height=300px>
          </div>
          <div class="info">
            <h3>Sumaiya Inayat</h3>
            <p>Software Engineering Student @ NED University of Engineering & Technology</p>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/facebook.svg"></a>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/github.svg"></a>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/instagram.svg"></a>
            <a href="#"><img class="social-icons" src="social-media-regular-icons/twitter.svg"></a>
          </div>
        </div>
       
      </div>
    </section>

   

    <section class="contact" id="contact">
      <div class="title reveal">
        <h2 class="section-title">Contact Me</h2>
      </div>
      <div class="content">
        <div class="row">
          <div class="card reveal">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info">
              <h3>Address</h3>
              <span>Bercelona, Spain</span>
            </div>
          </div>
          <div class="card reveal">
            <div class="contact-icon">
              <i class="fas fa-phone"></i>
            </div>
            <div class="info">
              <h3>Phone</h3>
              <span>+34566-839754</span>
            </div>
          </div>
          <div class="card reveal">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="info">
              <h3>Email Address</h3>
              <span>contact@email.com</span>
            </div>
          </div>
          <div class="card reveal">
            <div class="contact-icon">
              <i class="fas fa-globe"></i>
            </div>
            <div class="info">
              <h3>Website</h3>
              <span>mywebsite.com</span>
            </div>
          </div>
        </div>
        <div class="row">
        <form method="post" action="" autocomplete="off">
          <div class="contact-form reveal">
            <h3>Send Message</h3>
            <div class="input-box">
              <input type="text" name="name" value="" placeholder="Name" required>
            </div>
            <div class="input-box">
              <input type="text" name="email" value="" placeholder="Email" required>
            </div>
            <div class="input-box">
              <textarea name="message" rows="8" cols="80" placeholder="Message" required></textarea>
            </div>
            <div class="input-box">
              <input type="submit" class="send-btn" name="submit" value="SEND">
            </div>
          </div>
          </form>
        </div>
      </div>
    </section>

    <footer class="footer">
      <span class="footer-title">Attendee (Attendance Management System)</span>
      <p>Copyright @2021 <a href="#">Sufiyan Irfan & Sumaiya Inayat</a>. All Rights Reserved.</p>
    </footer>

    <script>


//javascript for responsive navigation sidebar menu

const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");
const navigationItems = document.querySelectorAll(".navigation a")

menuBtn.addEventListener("click",  () => {
  menuBtn.classList.toggle("active");
  navigation.classList.toggle("active");
});

navigationItems.forEach((navigationItem) => {
  navigationItem.addEventListener("click", () => {
    menuBtn.classList.remove("active");
    navigation.classList.remove("active");
  });
});

//javascript for scroll to top button
const scrollBtn = document.querySelector(".scrollToTop-btn");

window.addEventListener("scroll", function(){
  scrollBtn.classList.toggle("active", window.scrollY > 500);
});

//javascript for scroll back to top on click scroll-to-top button
scrollBtn.addEventListener("click", () => {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});

//javascript for reveal website elements on scroll
window.addEventListener("scroll", reveal);

function reveal(){
  var reveals = document.querySelectorAll(".reveal");

  for(var i = 0; i < reveals.length; i++){
    var windowHeight = window.innerHeight;
    var revealTop = reveals[i].getBoundingClientRect().top;
    var revealPoint = 50;

    if(revealTop < windowHeight - revealPoint){
      reveals[i].classList.add("active");
    }
  }
}
    </script>
<script>
  var icon = document.getElementById("icon")
  icon.onclick = function () {
      document.body.classList.toggle("dark-theme");
      if (document.body.classList.contains("dark-theme")) {
        icon.src="frontend-images/sun.svg"
        
      } else {
        icon.src="frontend-images/moon.svg"
      }
  }
</script>
<script>
  const colors=document.getElementsByClassName('colors');
  let i;
  for(i=0;i<colors.length;i++){
    colors[i].addEventListener('click',changecolor)
  }
  function changecolor(){
    let color=this.getAttribute('data-color');
    document.documentElement.style.setProperty('--first-color',color)
  }
</script>
  </body>
</html>
