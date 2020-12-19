<?php
    include "include/check-session.php" ;
    include "include/databaseConnect.php" ;
	include 'include/topMost.php';
?>
<title>Review Page</title>
<?php 
	include 'include/top.php';
	include 'include/navbar.php';
	?>
	<section>
    <!-- *************MAIN CONTENT*****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" id="facultyList" style="display:inline-block;">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <div class="row">
                <div class="col-md-12 pull-left">
                  <h4 style="color:black; font-size: 18px">Review Your Submission</h4>
                </div>
              </div>
              <div style="overflow-x:auto;">
                <table class="table table-striped table-advance table-hover">
                  <thead>
                    <tr>
                      <th>Exam Code</th>
                      <th class="hidden-phone">Subject Name</th>
                      <th>Class</th>
                      <th>Alloted Date</th>
                      <th>Submitted On</th>
                      <th>Download File</th>
                    </tr>                    
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Exam Code</th>
                      <th class="hidden-phone">Subject Name</th>
                      <th>Class</th>
                      <th>Alloted Date</th>
                      <th>Submitted On</th>
                      <th>Download File</th>
                    </tr>                    
                  </tfoot>
                  <tbody>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_exams,tbl_subjects where teacher_Id=:uid AND status = 1 AND tbl_exams.subject_id=tbl_subjects.subject_id");
                    $stmt->bindParam(':uid',$_COOKIE["teacher_Id"]);
                    $stmt->execute();
                    while($rows = $stmt->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $rows["exam_Id"]?></td>
                        <td><?php echo $rows["subject_name"]?></td>
                        <td><?php echo $rows["class"]?></td>
                        <td><?php echo $rows["allotment"]?></td>
                        <td><?php echo $rows["deadline"]?></td>
                        <td><a href="<?php echo $rows["storage"]?>">Download</td>
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
	<?php
	include 'include/bottomNav.php';  
?>
<script type="text/javascript">
  var element = document.getElementById("review");
  element.classList.add("active");
</script>