<?php 
  include "include/check-session.php" ;
  include   "include/databaseConnect.php"; 
 $newadminName	=	$_REQUEST["newadminName"];
 $adminEmail	=	$_REQUEST["adminEmail"];
 $adminUserName	=	$_REQUEST["adminUserName"];
 $Password		=	$_REQUEST["Password"];
 $status		=   $_REQUEST["status"];
 



 // php code sending mail to respective admin regarding username & password
$to=$adminEmail;
$subject= "Regarding Username & Password at Faculty Panel.";
$message="Welcome at Admin Panel: This is your username ".$adminUserName." and this is your passwrod:".$Password;
$headers="From: tksuthar7463@gmail.com";
if(mail($to, $subject, $message, $headers)){
echo "Mail sent!";
}
else
{
echo "Mail is not sent.";
}

// mail.php end
 
$ipAddress  	= $_SERVER["REMOTE_ADDR"];
$loginTime  	= date('Y-m-d h:i:s');

$query ="select count(*) from tbl_admins where admin_Username = :adminUserName or admin_Email = :adminEmailId";
$stmt=$conn->prepare($query);
$stmt->bindParam(':adminUserName', $adminUserName);
$stmt->bindParam(':adminEmailId', $adminEmail);
$stmt->execute();
$numrows=$stmt->fetchColumn();
if($numrows > 0 )
{
	$stmt=null;
	$conn=null;
	header("location:adminList.php?msg=1");
}
else 
{
$stmt = $conn->prepare("insert into tbl_admins(admin_Name,admin_Email,admin_Username,status,admin_Password,added_IpAddress,added_DateTime) VALUES (:newadminName, :adminEmail,:adminUserName,:status,:Password,:ipAddress,:loginTime)");
$stmt->bindParam(':newadminName', $newadminName);
$stmt->bindParam(':adminEmail', $adminEmail);
$stmt->bindParam(':adminUserName', $adminUserName);
$stmt->bindParam(':Password', $Password);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':ipAddress', $ipAddress);
$stmt->bindParam(':loginTime', $loginTime);
$stmt->execute(); 
$stmt=null;
header("location:adminList.php?msg=2");
}
?>