<?php
echo "hello";
$a="Sufiyan Irfan";
fopen("student_attendance_record/".$a.".txt", "a") or die("Unable to open file!");  

if(file_get_contents("student_attendance_record/".$a.".txt")){
    unlink("student_attendance_record/".$a.".txt");
    echo $a."attendance has been marked successfully";
}
header("Refresh:60");
?>