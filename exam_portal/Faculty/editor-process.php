<?php
  include "include/check-session.php" ;
  include   "include/databaseConnect.php";
  
  $file1 = file_get_contents('include/upr.php');
  $file2 = file_get_contents('include/bottom.php');

        $examid=$_REQUEST["id"];
        $editor_data=$_REQUEST['editor'];
        $editor_content= $file1.$editor_data.$file2;;

        $submitted_time=date('Y-m-d h:i:s');
        $ext= "html";
        $file_name=$examid."_".$_COOKIE["teacher_Name"].".".$ext;

        $file=fopen("../files/".$file_name, a);
        fwrite($file, $editor_content);

        $address="../files/".$file_name;

        $stmt = $conn->prepare("UPDATE tbl_exams SET storage=:address,deadline =:submitted_time,status=1 WHERE exam_Id=:Id");
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':submitted_time',$submitted_time);
        $stmt->bindParam(':Id',$examid);
        $stmt->execute();
        header("location:review.php");

        fclose($file);
  ?>
