<?php
session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'userregistration');

$user = $_POST['user'];
$pass =$_POST['pass'];

$s = " select * from usertable where email='$user' && password = '$pass'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if ($num == 1) {
    header("Location: index.php");
}else{
    echo"Enter valid username or password";
}
?>