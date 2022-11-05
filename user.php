<?php
    include "dbconnect.php";
    include "check.php";
    if($chk == False)
    {
        header("Location: index.php");
    }
    $admin = "SELECT is_admin FROM member WHERE id = '{$_SESSION['username']}' ";
    $result = @mysqli_fetch_array(mysqli_query($db,$admin));
    if($result['is_admin'] == 1)
    {
        header("Location: admin.php");
    }
?>
<html>
<header>
    <title>User Page</title>
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
</header>
<body>
    <h1 align="center">
        <?php
            $id = "{$_SESSION['username']}";
            $nick = "SELECT * FROM member WHERE id = '{$id}' ";
            $res = @mysqli_fetch_array(mysqli_query($db,$nick));
            echo "{$res['nickname']}";
        ?>
    </h1><hr>
    <div style="width:99vw; height: 85vh; display: flex; align-items:center;">
        <div style="border: 5px solid green; width:300px; height: 500px; line-height: 30px; text-align:center;  margin: 0 auto;">
            <h2> Menu </h2></br>
            <a href="change_pw.php"> 1. change password </a></br>
            <a href="delete_user.php"> 2. delete user </a></br>
            <a href="logout.php"> 3. logout </a>
        </div>
    </div>
</body>
</html>
