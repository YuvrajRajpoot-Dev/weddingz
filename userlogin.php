<?php
$flag = false;
if (isset($_POST['user'])){

// header("Location: userlogin.php");

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

// echo "$sql";

if ($con->query($sql) === TRUE) {
    // echo "New record created successfully";
    $flag = true; ;
  } 
  else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }
  
  $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>User</title>
</head>

<body>

    <div class="container bg-light align-items-center my-xxl-5 py-xxl-5 w-100">
        
            <!-- <img src="static/user1.png" class="rounded px-xxl-5 py-xxl-5 w-25 h-25 align-items-center" alt="Cinque Terre"> -->
        
        <div class="row">
            <div class="col-lg-6 px-xxl-5 mt-5" >
                <h2>Login here</h2>
                <form action="validation.php" method="POST">
                    <label class="mt-2 mb-2">Username</label>
                    <input type="text" name="user" class="form-control border-dark w-75 rounded-pill" placeholder="Username" required></input>
                    <label class="mt-2 mb-2">Password</label>
                    <input type="password" name="pass" class="form-control border-dark w-75 rounded-pill" placeholder="Password" required></input>
                    <button class="btn btn-outline-dark mt-2 rounded-pill" type="submit">Login</button>


                </form>

            </div>

            <div class="col-lg-6 mt-5">
                <h2>Registration here</h2>
                  
                  <form action="userlogin.php" method="POST">
                    <label class="mt-2 mb-2">Username</label>
                    <input type="text" name="user" class="form-control border-dark w-75 rounded-pill" placeholder="Username" required></input>
                    <label class="mt-2 mb-2">Password</label>
                    <input type="password" name="pass" class="form-control border-dark w-75 rounded-pill" placeholder="Password" required></input>
                    <button class="btn btn-outline-dark mt-2 rounded-pill" type="submit">Register</button>
            <!-- Alert box -->
                    <?php
                if($flag == true){
                    $user_name =$_POST['user'];
                    echo "<p class='successMsg'>Registration Succesful ! welcome $user_name. Now you can login. </p> ";
                 }
                ?>


                </form>

            </div>

        </div>
    </div>

</body>

</html>