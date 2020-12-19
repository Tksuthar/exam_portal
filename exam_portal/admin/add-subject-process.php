<?php 
  	include "include/check-session.php" ;
  	include   "include/databaseConnect.php"; 
 	$subName		=	$_REQUEST["subName"];

	$ipAddress  	= $_SERVER["REMOTE_ADDR"];
	$loginTime  	= date('Y-m-d h:i:s');

	$query ="select count(*) from tbl_subjects where subject_name = :subName";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':subName', $subName);
	$stmt->execute();
	$numrows=$stmt->fetchColumn();
	if($numrows > 0 )
	{
		$stmt=null;
		$conn=null;
		header("location:subjects.php?msg=1");
	}
	else 
	{
	$stmt = $conn->prepare("insert into tbl_subjects(subject_name,added_IpAddress,added_DateTime) VALUES (:subName,:ipAddress,:loginTime)");
	$stmt->bindParam(':subName', $subName);
	$stmt->bindParam(':ipAddress', $ipAddress);
	$stmt->bindParam(':loginTime', $loginTime);
	$stmt->execute(); 
	$stmt=null;
	header("location:subjects.php?msg=2");
	}
?>