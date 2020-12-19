<?php 
  include "include/check-session.php" ;
  include   "include/databaseConnect.php"; 
    $facultyName		=	$_REQUEST["facultyName"];
    $facultyEmail  	    =	$_REQUEST["facultyEmail"];
    $facultyUserName	=	$_REQUEST["facultyUserName"];
    $Password	    	=	$_REQUEST["Password"];
    $status	    	    =   $_REQUEST["status"];




    // php code sending mail to respective faculty regarding username & password
    $to=$facultyEmail;
    $subject= "Regarding Username & Password at Faculty Panel.";
    $message="Welcome at Faculty Panel: This is your username ".$facultyUserName." and this is your passwrod:".$Password;
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

$query ="select count(*) from tbl_teacher where teacher_Username = :facultyUserName or teacher_Email = :facultyEmailId";
$stmt=$conn->prepare($query);
$stmt->bindParam(':facultyUserName', $facultyUserName);
$stmt->bindParam(':facultyEmailId', $facultyEmail);
$stmt->execute();
$numrows=$stmt->fetchColumn();
if($numrows > 0 )
{
	$stmt=null;
	$conn=null;
	header("location:facultyList.php?msg=1");
}
else
{
    $stmt=null;
    $query ="insert into tbl_teacher(teacher_Name,teacher_Email,teacher_Username,teacher_Password,status,added_IpAddress,added_DateTime) values(:facultyName,:facultyEmail,:facultyUserName,:Password,:status,:ipAddress,:loginTime)";
    $stmt=$conn->prepare($query);
    $stmt->bindParam(':facultyName', $facultyName);
    $stmt->bindParam(':facultyEmail', $facultyEmail);
    $stmt->bindParam(':facultyUserName', $facultyUserName);
    $stmt->bindParam(':Password', $Password);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':ipAddress', $ipAddress);
    $stmt->bindParam(':loginTime', $loginTime);
    $stmt->execute();
    $adminIdd = $conn->lastInsertId();  
    $stmt=null;
        $arrsub = $_REQUEST["subject"];
        foreach($arrsub as $sub)
        {
            $query ="select count(*) from tbl_teach where teacher_Id = :adminIdd and subject_Id = :sub";
            $stmt=$conn->prepare($query);
            $stmt->bindParam(':adminIdd',$adminIdd);
            $stmt->bindParam(':sub',$sub);
            $stmt->execute();
            $numrows=$stmt->fetchColumn();
            $stmt->execute();
            $stmt=null;
            If($numrows < 1)
            {    
                $stmt = $conn->prepare("insert into tbl_teach(teacher_Id, subject_Id) values (:adminIdd,:sub)");
                $stmt->bindParam(':adminIdd', $adminIdd);
                $stmt->bindParam(':sub', $sub);
                $stmt->execute();
                $stmt=null;
            }
        }
	$conn=null;
	header("location:facultyList.php?msg=2");
}
?>