<?php
    $servername = "211.47.74.45";
    $user = "wonsang4232";
    $password = "dnjs6033^^";
    $dbname = 'dbwonsang4232';

    $db = mysqli_connect($servername, $user, $password, $dbname);
    if (!$db) {
        die("서버와의 연결 실패! : ".mysqli_connect_error());
    }
    session_start();
?>
