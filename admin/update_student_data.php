<?php

include('db_connection.php');

        $student_id = $_POST['student_id'];
        $student_name=$_POST['student_name'];
        $student_image=$_FILES['student_image']['name'];
        $temp_name=$_FILES['student_image']['tmp_name'];

        $password = $_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
      
        if(empty($student_image)){
            $student_image=$student_image;
        }
        // $courses_enrolled= explode(',',$_POST['courses_enrolled']);
        $sql="UPDATE student SET student_name='{$student_name}',student_image='{$student_image}', email='{$email}',phone='{$phone}' WHERE student_id={$student_id}";
      
        $result=mysqli_query($conn,$sql) or die("Error Coming"); 
        if($result){
          
          header('Location:view_student.php');
          exit;
        }
        

mysqli_close($conn); 
?>