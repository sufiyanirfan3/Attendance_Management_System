<?php
    include '../db_connection.php';
    $select="SELECT * FROM student";
    $run=mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){
        
        $student_id = $row_user['student_id'];
        $student_name = $row_user['student_name'];
        $date=date("Y-m-d");
        $select1="SELECT * FROM student_attendance where student_id='$student_id' and attendance_date='$date'";
        $run1=mysqli_query($conn,$select1);
        
        
        if($run1->num_rows==0){
            $sql="INSERT INTO `student_attendance` (`student_id`, `student_name`,`attendance_status`, `attendance_date`) VALUES ('$student_id','$student_name','Absent', CURRENT_DATE());";
            $result=mysqli_query($conn,$sql);
            echo "inserted successfully";
        }
    }         
?>