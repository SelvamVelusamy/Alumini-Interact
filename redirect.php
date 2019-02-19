<?php 
$username=$_POST['username']; 
$password=$_POST['password']; 
/*if($username == $password)
{
    echo "Login Succuss full" ;
}
else
{
    echo "Wrong Username or Password";
}*/
$connection = mysqli_connect('localhost','1377010','8144993311Aa','1377010');
$query = "select * from users where name='$username' and password='$password'";
$result = mysqli_query($connection,$query);
$count = mysqli_num_rows($result);
if($count==1)
{
    if($username=='student1')
    {
        ob_start();
        header('location: student1.html');
        ob_end_flush();
    }
    if($username=='student2')
    {
        ob_start();
        header('location: student2.html');
        ob_end_flush();
    }
    if($username=='alumini')
    {
        ob_start();
        header('location: alumini.php');
        ob_end_flush();
    }
}
else{
    echo "<h1 style='color:red' align='center'>User Doesn't Exist</h1>";
}
?>
