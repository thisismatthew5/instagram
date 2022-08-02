<?php
session_start();
    include("class/connection.php");
    include("class/login.php");

    $email = "";
    $password="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = new Login();
        $result = $login->verify($_POST);

        if(empty($result)){
            header("Location:profile.php");
            die;
        }else{
            echo $result;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align:center;">
    <h2>Login to Instagram</h2>
    <form action="" method="post">
        Email:<br>
        <input value="<?php echo $email; ?>" type="text" name = "email"><br><br>
        Password:<br>
        <input value="<?php echo $password ?>" type="password" name ="password"><br><br>
        <input type="submit" value="Login">
    </form>
    
</body>
</html>