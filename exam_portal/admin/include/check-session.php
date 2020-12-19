<?php
if(!isset($_COOKIE["adminName"]))
{
    header("location:admin-login.php");
    exit;
}
?>