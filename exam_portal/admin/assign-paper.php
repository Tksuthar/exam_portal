<?php
    include "include/check-session.php" ;
    include "include/databaseConnect.php" ;

    $arrsub = $_REQUEST["assign"];
    $subject_Id = $_REQUEST["sub"];
    $class=$_REQUEST["class"];
    $status =0;
    $allotment  	= date('Y-m-d');
    $deadline  	=   $_REQUEST["deadline"];
    $ipAddress  	= $_SERVER["REMOTE_ADDR"];
    $loginTime  	= date('Y-m-d h:i:s');

    foreach($arrsub as $teacher)
    {
        $stmt = $conn->prepare("select * from tbl_teacher where teacher_Id=:Id");
        $stmt->bindParam(':Id', $teacher);
        $stmt->execute();
        while($rows = $stmt->fetch())
        {
            echo $teacher_Id=$rows["teacher_Id"];
            echo $teacher_Name=$rows["teacher_Name"];
            echo $class;
            echo $status;
            echo $deadline;
            $stmt=null;
            $stmt = $conn->prepare("insert into tbl_exams(subject_Id,teacher_Id,class,status,allotment,deadline,added_IpAddress,added_DateTime) VALUES (:subject_Id, :teacher_Id,:class,:status,:allotment,:deadline,:ipAddress,:loginTime)");
                $stmt->bindParam(':subject_Id', $subject_Id);
                $stmt->bindParam(':teacher_Id', $teacher_Id);
                $stmt->bindParam(':class', $class);
                $stmt->bindParam(':allotment', $allotment);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':deadline', $deadline);
                $stmt->bindParam(':ipAddress', $ipAddress);
                $stmt->bindParam(':loginTime', $loginTime);
                $stmt->execute();
                $stmt=null;
                header("location:information.php?msg=1");
        }

        // php code sending mail to respective faculty regarding username & password
        $to=$facultyEmail;
        $subject= "Admin Assigend You a Paper.";
        $message="Subject: ".$subject_name." Deadline for completing is ".$deadline;
        $headers="From: tksuthar7463@gmail.com";
        if(mail($to, $subject, $message, $headers)){
        echo "Mail sent!";
        }
        else
        {
        echo "Mail is not sent.";
        }

        // mail.php end

        $stmt=null;
    }
?>
