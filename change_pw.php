<?php
    include "dbconnect.php";
    $id = $_SESSION['username'];
    $change_pw = "SELECT * FROM member WHERE id = '{$id}'";
    $result = @mysqli_fetch_array(mysqli_query($db,$change_pw));
    $pw = $result['password'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap1.min.css">
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
      table {
        width: 100%;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
        text-align: center;
      }
    </style>
</head>

<body>

<div class="container">
    <br><br><br><br><br><br><br><br>
    <form class="form-horizontal" method="POST">
        <div class="form-group" style="text-align:center">
            <label for="user_name">ID</label><br>
            <input type="text" name="user_name"  class="form-control" id="inputID" placeholder="Input your ID"
                required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" /><br>
        </div>
        <br>
        <div class="form-group" style="text-align:center">
            <label for="user_password">Original Password</label><br>
            <input type="password" name="original_pw" class="form-control" id="inputPassword" placeholder="Input your password"
                required  autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" /><br>
        </div>
        <br>
        <div class="form-group" style="text-align:center">
            <label for="user_password">New Password</label><br>
            <input type="password" name="new_pw" class="form-control" id="inputPassword" placeholder="Input your password"
                required  autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" /><br>
        </div>
        <div class="form-group" style="text-align:center">
            <input type="submit" name="change" value="Change"></input>
        </div>
        </br>
    </form>
</div>
</body>
</html>

<?php
    if ( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['change']))
    {
        $username=$_POST['user_name'];
        $original_pw=$_POST['original_pw'];
        if ($username != $id)
        {
            $errMSG = "Wrong ID!!";
        }
        else if ($original_pw != $pw)
        {
            $errMSG = "Wrong Password!!";
        }
        else
        {
            $change = "UPDATE member SET password = '{$_POST['new_pw']}' WHERE id = '{$id}'";
            $db->query($change);
            header("Location: user.php");
            exit;
        }
    }
    if(isset($errMSG))
        echo "<script>alert('$errMSG')</script>";
?>
