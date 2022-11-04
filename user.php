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
    <p>hello user</p>
</header>
<body>
    <a class="btn btn-success" href="logout.php" style="margin-left: 50px">
    <span class="glyphicon glyphicon-user"></span>&nbsp;logout</a>
</body>
</html>
