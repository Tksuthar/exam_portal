<?php
$_COOKIE["adminId"]			= "";
$_COOKIE["adminName"]		= "";
setcookie("adminId","",time() - 3600);
setcookie("adminName","",time() - 3600);
header( "location:admin-login.php?msg=1");
?>