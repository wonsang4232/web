<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap1.min.css">
</head>

<body>
<br><br><br><br><br><br><br><br><br><br>
<div class="container">
    <form class="form-horizontal" method="POST">
        <div class="form-group" style="text-align:center">
            <label for="user_name">Nickname</label><br>
            <input type="text" name="nickname"  class="form-control" id="inputID" placeholder="Input your nickname"/><br>
        </div>
        <br>
        <div class="form-group" style="text-align:center">
            <label for="user_name">ID</label><br>
            <input type="text" name="user_name"  class="form-control" id="inputID" placeholder="Input your ID"/><br>
        </div>
        <br>
        <div class="form-group" style="text-align:center">
            <label for="user_password">Password</label><br>
            <input type="password" name="user_password" class="form-control" id="inputPassword" placeholder="Input your password"/><br>
        </div>
        <br>
        <div class="from-group" style="text-align:center">
            <button type="submit" name="register" class="btn btn-success">Register</button>
        </div>
        </br>
    </form>
</div>
</body>
</html>

<?php
    include "dbconnect.php";
    if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['register']))
    {
        $nickname = $_POST['nickname'];
        $id = $_POST['user_name'];
        $pwd = $_POST['user_password'];
        if(empty($nickname))
        {
            $errMSG = "Input your nickname!!";
        }
        else if(empty($id))
        {
            $errMSG = "Input your username!!";
        }
        else if(empty($pwd))
        {
            $errMSG = "Input your password!!";
        }
        else
        {
            $id_check = "SELECT id FROM member WHERE id = '{$id}' ";
            $result = @mysqli_fetch_array(mysqli_query($db,$id_check));
            if($result['id'])
            {
                echo "<script>alert('This ID already exists')</script>";
                echo "<script>location.replace('#');</script>";
            }
            $add_user = "INSERT INTO member VALUES('{$id}','{$pwd}','{$nickname}','0')";
            if($db->query($add_user))
            {
                echo "<script>alert('You Registered')</script>";
                echo "<script>location.replace('/');</script>";
            }
        }
        if(isset($errMSG))
            echo "<script>alert('$errMSG')</script>";
    }
?>
