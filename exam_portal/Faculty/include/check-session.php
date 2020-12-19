<?php
if(!isset($_COOKIE["teacher_Name"]))
{
    header("location:faculty-login.php");
    exit;
}
?>