<?php

header("Location: userlogin.php");

$server = "localhost";
$username ="root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("conection faild".mysqli_connect_error());
}

$user = $_POST['user'];
$pass = $_POST['pass'];

// $sql = CREATE TABLE `userregistration`.`usertable` ( `email` VARCHAR(50) NOT NULL , `password` INT(50) NOT NULL , `Time` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`email`)) ENGINE = InnoDB;
$sql = "INSERT INTO `userregistration`.`usertable` (email, password)
VALUES ('$user', '$pass')";

echo "$sql";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['user'] = $user ;
  } 
  else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }
  
  $con->close();

?>