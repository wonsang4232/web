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
    <h2 align="center">
        <?php
            $id = "{$_SESSION['username']}";
            $nick = "SELECT * FROM member WHERE id = '{$id}' ";
            $res = @mysqli_fetch_array(mysqli_query($db,$nick));
            echo "{$res['nickname']}";
        ?>
    </h2><hr>
    <div class="form-group" style="text-align:right;">
        <a href="logout.php">logout</a>
    </div>
</body>
</html>
