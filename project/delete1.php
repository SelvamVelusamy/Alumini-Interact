<?php
$name=$_POST['stuname'];
$time=$_POST['time'];
$connection=mysqli_connect('localhost','1377010','8144993311Aa','1377010');
$query="delete from sevents where name='$name' and time='$time'";
mysqli_query($connection,$query);
?>