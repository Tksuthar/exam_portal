<?php
    include  "include/check-session.php" ;
    include "include/databaseConnect.php" ;
?>

  <?php include "include/top-most.php" ;?>
  <title>Admin: Exam Portal</title>
  <?php
    include "include/top.php";
    include "include/navbar.php";
  ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" id="assigned_paper">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <div class="row">
                <div class="col-md-2 pull-left">
                  <h4 style="color:black; font-size: 18px">List Of Alloted Paper</h4>
                </div>
                <div class="col-md-2 pull-right" style="margin-right: 5px;">
                  <a href="create-paper.php" class="btn btn-primary"><b>+</b>Create Paper</a>
                </div>
              </div>
              <div style="overflow-x:auto;">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                          <th>Exam Id</th>
                          <th class="hidden-phone">Faculty Name</th>
                          <th>Assigned Subject</th>
                          <th>Class</th>
                          <th>Status</th>
                          <th>Alloted Date</th>
                          <th>Dead Date</th>
                          <th>Uploaded File</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>Exam Id</th>
                          <th class="hidden-phone">Faculty Name</th>
                          <th>Assigned Subject</th>
                          <th>Class</th>
                          <th>Status</th>
                          <th>Alloted Date</th>
                          <th>Dead Date</th>
                          <th>Uploaded File</th>
                        </tr>
                    </tfoot>
                  <tbody>
                    <?php
                    $stmt = $conn->prepare("select tbl_exams.exam_Id,tbl_exams.status,class,teacher_Name,subject_name,allotment,deadline,storage from tbl_exams,tbl_subjects,tbl_teacher where tbl_exams.teacher_Id=tbl_teacher.teacher_Id AND tbl_exams.subject_Id=tbl_subjects.subject_Id;");
                    $stmt->execute();
                    while($rows = $stmt->fetch())
                    {
                    $status = $rows["status"];
                    $storage =$rows["storage"];
                    if( $status == 0)
                    {
                        $status = "Not Submited";
                    }
                    else
                    {
                        $status = "Submited";
                    }
                    ?>
                    <tr>
                        <td><?php echo $rows["exam_Id"]?></td>
                        <td><?php echo $rows["teacher_Name"]?></td>
                        <td><?php echo $rows["subject_name"]?></td>
                        <td><?php echo $rows["class"]?></td>
                        <td><?php echo $status?></td>
                        <td><?php echo $rows["allotment"]?></td>
                        <td><?php echo $rows["deadline"]?></td>
                        <?php
                        if($status == 0)
                        {?>
                            <td>Not Submitted</td>
                        <?php
                        }
                        else
                        {?>
                            <td><a href="<?php echo $storage;?>">Download</td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                    }
                      $conn='null';
                      $stmt='null';
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
  </section>

<?php include "include/footer.php" ;?>

<!-- created by Tarun Kumar & Mudit Singhal -->
<script type="text/javascript">
  var element = document.getElementById("information");
  element.classList.add("active");
</script>

<!-- created by: MSA Consultancy Company -->
