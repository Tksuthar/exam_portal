<?php 
  include "include/check-session.php" ;
  include   "include/databaseConnect.php";
  
    $examid=$_REQUEST["examid"];
    
    if ($_FILES["file"]["error"] > 0)
    {
      echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        $filename = $_FILES['file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        $file_type= $_FILES['file']['type'];
        $file_tmp= $_FILES['file']['tmp_name'];
        $file_size= $_FILES['file']['size'];
        $name=$_POST['usr_name'];
        $submitted_time=date('Y-m-d h:i:s');
        $file_name=$examid."_".$_COOKIE["teacher_Name"].".".$ext;
        move_uploaded_file($file_tmp, "../files/".$file_name);
        $address="../files/".$file_name;
        $stmt = $conn->prepare("UPDATE tbl_exams SET storage=:address,deadline =:submitted_time,status=1 WHERE exam_Id=:Id");
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':submitted_time',$submitted_time);
        $stmt->bindParam(':Id',$examid);
        $stmt->execute();
        header("location:review.php");
   
     }
  ?>