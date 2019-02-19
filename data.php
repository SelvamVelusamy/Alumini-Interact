<?php
$name = $_POST['name'];
$contact = $_POST['contact'];
$time = $_POST['time'];
$date=$_POST['date'];
$state="none";
$connection = mysqli_connect('localhost','1377010','8144993311Aa','1377010');
$query="select * from events where name='$name'";
$result=mysqli_query($connection,$query);
$count=mysqli_num_rows($result);
if($count<2) {
$current=date("Y-m-d");
$diff=(strtotime($date)-strtotime($current))/86400;
if($diff>7) {
$query = "insert into events values('$name','$contact','$time','$date')";
$query1 = "insert into sevents (name,contact,time,date,status) values('$name','$contact','$time','$date','$state')";
mysqli_query($connection,$query);
mysqli_query($connection,$query1);
echo 'Successfully Inserted';
echo '<br><a href="'.$name.'.html">Back</a>';
}
else {
echo 'Cannot Book. Try Another Event';
echo '<br><a href="'.$name.'.html">Back</a>';
}
}
else {
    echo 'Too Many Attempts';
    echo '<br><a href="'.$name.'.html">Back</a>';
}
?>