<?php
$_COOKIE["teacher_Id"]			= "";
$_COOKIE["teacher_Name"]		= "";
setcookie("teacher_Id","",time() - 3600);
setcookie("teacher_Name","",time() - 3600);
header( "location:faculty-login.php?msg=1");
?>