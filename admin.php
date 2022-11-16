<?php
    include "dbconnect.php";
    include "check.php";
    if($chk != 1 or $_SESSION['username'] != 'admin')
    {
        session_destroy();
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
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
    <h1 align="center">Admin</h1>
    <div style="text-align:right">
        <a href="logout.php" > Logout </a>
    </div>
    <hr>
    <table>
      <thead>
        <tr>
            <th>Nickname</th>
            <th>ID</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $sql = "SELECT * FROM member";
            $result = mysqli_query( $db, $sql );
            while( $row = mysqli_fetch_array( $result ) )
            {
                $edit = '
                <form action="admin_edit.php" method="POST">
                <input type="submit" value="Edit">
                </form>
                ';
                $delete = '
                <form action="delete_user.php" method="POST">
                <input type="submit" value="Delete">
                </form>
                ';
                echo '<tr><td>' . $row[ 'nickname' ] . '</td><td>'. $row[ 'id' ] . '</td><td>' . $row[ 'password' ] . '</td><td>' . $edit . '</td><td>' . $delete . '</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
