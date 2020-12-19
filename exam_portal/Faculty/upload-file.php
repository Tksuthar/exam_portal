<?php
  // include 'connection.php';

  // if(isset($_FILES['file']) && isset($_POST['submit'])){
  //     // echo "<pre>";
  //     // print_r($_FILES['file']);
  //     // echo "</pre>";
  //     $file_name= $_FILES['file']['name'];
  //     $file_type= $_FILES['file']['type'];
  //     $file_tmp= $_FILES['file']['tmp_name'];
  //     $file_size= $_FILES['file']['size'];
  //     $name=$_POST['faculty_name'];
  //     move_uploaded_file($file_tmp, "file/".$file_name);

  //     $sql="INSERT INTO `exam` (`name`, `file`) VALUES ('$name', '$file_name')";
  //     if (!$sql || mysqli_query($con, $sql)) {
  //       header("Location:index.php");
  //     }
  //     else {
  //       header("Location:error.php");
  //     }
  // }
        header("Location:index.php");
?>