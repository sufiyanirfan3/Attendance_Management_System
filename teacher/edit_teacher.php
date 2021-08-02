<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="edit_teacher.css">

</head>

<body>
    <div class="container">
        <div class="title">
            Edit Teacher
        </div> 
<?php
  
    include '../db_connection.php';
        $teacher_id=$_GET['teacher_id'];
        $sql="SELECT * FROM teacher where teacher_id='$teacher_id'";
      
        $result=mysqli_query($conn,$sql);
        $row_user=mysqli_fetch_array($result);

        $teacher_name=$row_user['teacher_name'];

        $teacher_image=$row_user['teacher_image'];
        $password = $row_user['password'];
        $email=$row_user['email'];
        $phone=$row_user['phone'];
        $address=$row_user['address'];
  
?>

        <form class="form" method="post" action="tupdate.php" autocomplete="off" enctype="multipart/form-data">

            <div class="inputfield">
                <label for="">Teacher Name</label>
                <input type="hidden" name="teacher_id" class="input" value="<?php echo $teacher_id?>" required />
                <input type="text" name="teacher_name" class="input" value="<?php echo $teacher_name?>" required />
            </div>

            <div class="inputfield">
                <label for="">Teacher Image</label>
                <input type="file" name="teacher_image" class="input" />
            </div>

            <div class="inputfield">
                <label for="">Password</label>
                <input type="password" name="password" class="input" value="<?php echo $password?>" required />
            </div>

            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" value="<?php echo $email?>" required />
            </div>

            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" value="<?php echo $phone?>" required />
            </div>

            <div class="inputfield">
                <label for="">Address</label>
                <input type="text" name="address" class="input" value="<?php echo $address?>" required />
            </div>

            <input type="submit" name="teacher" value="save" id="save" class="btn" />
        </form>

</div>
</body>
</html>
