<?php
    include "dbconnect.php";
    $id = $_SESSION['username'];
    $delete_user = "DELETE FROM member WHERE id = '{$id}'";
    $db->query($delete_user);
    session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index.php" />
