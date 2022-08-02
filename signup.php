<?php
include("class/connection.php");
include("class/register.php");

    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";
    $age = "";
    
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $signup = new Signup();
    $result = $signup->verify($_POST);
    // echo $result;

    if($result != ""){
        
        echo "<div style='text-align:center; font-size: 12px; background-color:gray; color:white;'>";
        echo "<br>The following error occured<br><br>";
        echo $result;
        echo "</div>";
    }else{
        header("Location:login.php");
    }

    $first_name =$_POST['first_name'];
    $email = $_POST['email'];
    $last_name =$_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
        

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
<style>
    .text{
        font-size:16px;
        height:20px;
        width:250px;
        border:none;
        padding-left:20px;
        background-color:grey;
    }
</style>
<body  style="text-align:center;">
    <h2>Register to Instagram</h2>
    <form action="" method="POST">
        <label>first Name:</label><br>
        <input value="<?php echo $first_name?>" class="text"type="text" name="first_name"><br><br>
        <label>last Name:</label><br>
        <input value="<?php echo $last_name?>" class="text"type="text" name="last_name"><br><br>
        <label>Age:</label><br>
        <input value="<?php echo $age?>" class="text"type="text" name="age"><br><br>
        <label>email:</label><br>
        <input value="<?php echo $email?>" class="text" type="text" name="email"><br><br>
        <label>Gender</label><br>
        <select class="text" id="gender" name="gender">
            <option value="<?php echo $gender?>"></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <label>Password:</label><br>
        <input  class="text"type="text" name="password"><br><br>
        <label>confirm Password:</label><br>
        <input class="text" type="text" name="cpassword"><br><br>
        <input type="submit" value="signup">
    </form>
    
</body>
</html>