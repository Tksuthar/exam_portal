<?php
    include "include/check-session.php" ;
    include "include/databaseConnect.php" ;
    include 'include/topMost.php';
?>
<title>Task Page</title>
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
                <div class="col-md-2 pull-left">
                  <h4 style="color:black; font-size: 18px">Your Task</h4>
                </div>
              </div>
              <div style="overflow-x:auto;">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                          <th>Exam Code</th>
                          <th>Subject Name</th>
                          <th>Class</th>
                          <th>Alloted Date</th>
                          <th>Deadline Date</th>
                          <th>Status</th>
                          <th style="text-align: center;">Upload File</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Exam Code</th>
                            <th>Subject Name</th>
                            <th>Class</th>
                            <th>Alloted Date</th>
                            <th>Deadline Date</th>
                            <th>Status</th>
                            <th style="text-align: center;">Upload File</th>
                        </tr>
                    </tfoot>
                  <tbody>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_exams,tbl_subjects where status = 0 AND teacher_Id=:uid AND tbl_exams.subject_id=tbl_subjects.subject_id");
                    $stmt->bindParam(':uid',$_COOKIE["teacher_Id"]);
                    $stmt->execute();
                    while($rows = $stmt->fetch())
                    {
                    $status = $rows["status"];

                    if( $status == 0)
                    {
                        $status = "Not Submitted";
                    }
                    else
                    {
                        $status = "Submitted";
                    }
                    $exam_Id=$rows["exam_Id"];
                    ?>
                    <tr>
                        <td><?php echo $rows["exam_Id"]?></td>
                        <td><?php echo $rows["subject_name"]?></td>
                        <td><?php echo $rows["class"]?></td>
                        <td><?php echo $rows["allotment"]?></td>
                        <td><?php echo $rows["deadline"]?></td>
                        <td><?php echo $status?></td>
                        <td><a href="task-editor.php?id= <?php echo $rows["exam_Id"];?>"><span class="glyphicon glyphicon-pencil">Create</span></a></td>
                        <td>
                            <form action="file-process.php" method="POST" enctype="multipart/form-data">
                                <input type="file" name="file"><br/>
                                <input type="hidden" name="examid" value=<?php echo $exam_Id ;?> >
                                <input type="submit" name="id" value="Upload">
                            </form>
                        </td>
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
  function uploadedDoc(){
    var filename=document.getElementById("file").value;
    var extension = filename.split('.').pop();

    if(extension=="docx" || extension=="doc"){
      document.getElementById("paper_document").disabled=false;
    }

    else{
      alert("Extension of file must be .pdf, .doc, and .docx required.");
      document.getElementById("file").value=null;
    }

    const fi = document.getElementById('file');
    // Check if any file is selected.
    if (fi.files.length > 0) {
  }

  function fileSubmitted(){
    document.getElementById("upload_status").innerHTML="Submitted";
  }
</script>


<script type="text/javascript">
  var element = document.getElementById("task");
  element.classList.add("active");
</script>
