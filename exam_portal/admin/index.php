<?php 
include  "include/check-session.php" ;
  include "include/top-most.php" ;?>
  <title>Admin: Exam Portal</title>
 <?php 
    include "include/top.php" ;?>
    <?php 
    include "include/navbar.php" ;?>
    <?php
    include "include/databaseConnect.php";
    	 
		$ipAddress  	= $_SERVER["REMOTE_ADDR"];
		$loginTime  	= date('Y-m-d h:i:s');
        $query="UPDATE tbl_admins SET  updated_IpAddress = :ipAddress , update_DateTime=loginTime where admin_Id= :adminId";
        $stmt=$conn->prepare($query);
		$stmt->bindParam(':ipAddress', $ipAddress);
		$stmt->bindParam(':loginTime', $loginTime);
		$stmt->bindParam(':adminId', $_COOKIE["adminId"]);
		$stmt->execute();
		$stmt->null;
		header("location:information.php");
		
	?>
<?php include "include/footer.php" ;?>