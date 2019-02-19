<?php
   $connection=mysqli_connect('localhost','1377010','8144993311Aa','1377010');
   $student_name =  $_POST['stuname'];
   $time =  $_POST['time'];
   $status=$_POST['status'];
   $query = "delete from events where name = '$student_name' and time = '$time'";
   $query1="update sevents set status='$status' where name = '$student_name' and time = '$time'";
   $records=mysqli_query($connection,$query);
   $records=mysqli_query($connection,$query1);
?>