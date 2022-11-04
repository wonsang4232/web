<?php
    include "dbconnect.php";
    include "check.php";
    if($chk == False)
    {
        header("Location: logout.php");
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
    <div style="width:100vw; height: 90vh; display: flex; align-items: center;">
        <div style="border: 1px solid green; width:300px; height: 500px; line-height: 30px; text-align:center;  margin: 0 auto;">
            <h2> Menu </h2>
        </div>
    </div>
</body>
</html>
