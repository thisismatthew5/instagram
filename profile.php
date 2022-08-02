<?php
session_start();
include("class/connection.php");
include("class/login.php");
include("class/user.php");

if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
    $id = $_SESSION['userid'];
    $login = new Login();
    $result = $login->check_login($id);
    if($result){
        $user = new User();
        $user_data = $user->get_data($id);
    }else{
        header("Location:login.php");
        die;
    }

}
else{
    header("Location:login.php");
        die;
}

print_r($user_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Instagram</h1>
    <div style="float:right;">
        <a href="logout.php">LOGout</a>
    </div>
</body>
</html>