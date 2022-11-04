<?php
    $chk = False;
    if(isset($_SESSION['enc']) && isset($_SESSION['logined']) && isset($_SESSION['username']))
    {
        $enc = hash('sha256', "{$_SESSION['username']}");
        if($enc == $_SESSION['enc'] && $_SESSION['logined'] == "True")
        {
            $chk = True;
        }
    }
?>
