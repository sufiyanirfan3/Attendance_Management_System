<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Warning Alert Notification | CodingNepal</title>
      <link rel="stylesheet" href="../alert.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   </head>
   <body>
     
      <div class="alert hide">
         <span class="fas fa-check-circle"></span>
         <span class="msg">Your Attendance has been marked successfully !!</span>
         <div class="close-btn">
            <span class="fas fa-times"></span>
         </div>
      </div>
      <script>
        
           $('.alert').addClass("show");
           $('.alert').removeClass("hide");
           $('.alert').addClass("showAlert");
           setTimeout(function(){
             $('.alert').removeClass("show");
             $('.alert').addClass("hide");
           },5000);
        
         $('.close-btn').click(function(){
           $('.alert').removeClass("show");
           $('.alert').addClass("hide");
         });
      </script>
   </body>
</html>