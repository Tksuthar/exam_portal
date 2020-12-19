<?php
$adminUserName = Trim($_REQUEST["adminUserName"]);
$adminPassword = Trim($_REQUEST["adminPassword"]);
if(strlen($adminUserName) < 1  || empty($adminUserName))
{
	header("location:adminLogin.php?err=1");
	exit;
}
if(strlen($adminPassword) < 1  || empty($adminPassword))
{
	header("location:admin-login.php?err=2");
	exit;
}
include "include/databaseConnect.php";

$adminUserName	=  $adminUserName;
$adminPassword	= $adminPassword;
$ipAddress  	= $_SERVER["REMOTE_ADDR"];
$loginTime  	= date('Y-m-d h:i:s');

$query ="select count(*) from tbl_admins where admin_Username = :adminUserName and admin_Password = :adminpassword";
$stmt=$conn->prepare($query);
$stmt->bindParam(':adminUserName', $adminUserName);
$stmt->bindParam(':adminpassword', $adminPassword);
$stmt->execute();
$numrows=$stmt->fetchColumn();
if ($numrows < 1)
{	
	$stmt->null;
	$conn->null;	
	header("location:admin-login.php?err=1");
	exit;
}
else
{
	$stmt->null;
	$stmt = $conn->prepare("select * from tbl_admins where admin_Username =:adminUserName and admin_Password =:adminPassword");
	$stmt->bindParam(':adminUserName', $adminUserName);
	$stmt->bindParam(':adminPassword', $adminPassword);
	$stmt->execute();
	$row = $stmt->fetch();
	$adminName	= $row["admin_Name"];
	$adminId	= $row["admin_Id"];
	$status	    = $row["status"];
	if($status == 1 )
	{	
		$stmt->null;
		setcookie("adminName",$adminName,time()+3600);
		setcookie("adminId", $adminId,time()+3600);
		$conn->null;
		header("location:information.php");
	}
	else
	{
		$stmt->null;
		$conn->null;	
		header("location:admin-login.php?err=2");	
	}
}
?>