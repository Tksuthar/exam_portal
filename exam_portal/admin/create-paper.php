<?php
    include "include/check-session.php" ;
    include "include/databaseConnect.php" ;
    include "include/topmost.php" ;
    $sid=0;
    ?>
  <title>Exam Information</title>
 <?php
    include "include/top.php" ;?>
    <?php
    include "include/navbar.php" ;?>

    <!--main content start-->
    <section id="main-content">
      <!-- create paper code start -->
      <section class="wrapper" id="create_paper">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <div class="row">
                <div class="col-md-12">
                  <h4 style="color: black; padding-left: 4px;"><strong>Select subjet</strong></h4>
                </div>
                <div class="col-md-12">
                  <div class="container">
                    <form method="post">
                    <?php
                        $stmt = $conn->prepare("select * from tbl_subjects");
                        $stmt->execute();
                        while($rows = $stmt->fetch())
                        {
                        $subject_id = $rows["subject_Id"];
                        $subject_name = $rows["subject_name"];
                        ?>
                        <div >
                          <label>
                            <input type="radio" name="MyRadio"  class="sgrCheck" value="<?php echo $subject_id;?>" >&nbsp;&nbsp; <?php echo strtoupper($subject_name)?>
                          </label>
                        </div>
                        <?php
                        }
                        $stmt=null;
                    ?>
                    <input type="submit" value="Result" name="Result">
                     </form >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- create paper code end -->

      <!-- display searched result start-->
      <section class="wrapper" id="faculty_result">
        <div class="row">
          <div class="col-md-12">

            <!-- content panel start -->
            <div class="content-panel">
            	<form method="POST" action="assign-paper.php">
	              <div class="row">
	                <div class="col-md-2 pull-left">
	                  <h4 style="color:black; font-size: 15px">Available Result for selected subject</h4>
	                </div>
	                <div class="col-md-2 pull-right" style="margin-right: 5px;">
	                  <button class="btn-primary btn" type="submit" name="submit" onclick="sendToFaculty();">Send</button>
	                </div>
	              </div>
	              <div style="overflow-x:auto;">
	                  <?php
	                  $sid = $_POST["MyRadio"];
	                  ?>
	                    <table class="table table-striped table-advance table-hover table-condensed">
	                      <thead>
	                          <tr>
	                              <td>Select</td>
	                              <td>ID</td>
	                              <td>Name</td>
	                              <td>Deadline&nbsp;&nbsp;Class</td>
	                          </tr>
	                      </thead>
	                      <tfoot class="thead-dark">
	                          <tr>
	                              <td>Select</td>
	                              <td>ID</td>
	                              <td>Name</td>
	                              <td>Deadline&nbsp;&nbsp;Class</td>
	                          </tr>
	                      </tfoot>
	                      <tbody>
	                        <?php
	                          $stmt = $conn->prepare("select distinct tbl_teacher.teacher_Id,teacher_Name from tbl_teach,tbl_teacher,tbl_subjects where tbl_teach.teacher_Id=tbl_teacher.teacher_Id AND tbl_teach.subject_Id=:sub AND tbl_subjects.subject_Id= :sub;");
	                          $stmt->bindParam(':sub', $sid);
	                          $stmt->execute();
	                          while($rows = $stmt->fetch())
	                          {
	                          ?>
	                          <tr>
	                              <input type="hidden" name="sub" value="<?php echo $sid; ?>">
	                              <td><input type="checkbox" name="assign[]" value="<?php echo $rows['teacher_Id'];?>"></td>
	                              <td><?php echo $rows['teacher_Id']?></td>
	                              <td><?php echo $rows["teacher_Name"]?></td>
                                <td>
                                  <input type="date" id="deadline" name="deadline">
                                  &nbsp;&nbsp;
                                  <select class="form-control" name="class">
                                    <option>LKG</option>
                                    <option>UKG</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                  </select>
                                </td>
		                          </tr>
		                          <?php
		                          }
		                              $stmt->null;
		                              $conn->null;
		                          ?>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		        </div>
            <!-- content panle end -->
        	</form>
          </div>
        </div>
      </section>
      <!-- display searched result end -->
    </section>
    <!--main content end-->
  </section>

<?php include 'include/footer.php' ?>

<script type="text/javascript">
  function sendToFaculty(){
    var unique_id = $.gritter.add({
      // (string | mandatory) the heading of the notification
      title: 'Message has been successfully sent to faculty!',
      // (string | mandatory) the text inside the notification
      text: 'Click to cancel.',
      // (string | optional) the image to display on the left
      image: 'img/ui-sam.png',
      // (bool | optional) if you want it to fade out on its own or just sit there
      sticky: false,
      // (int | optional) the time you want it to be alive for before fading out
      time: 8000,
      // (string | optional) the class name you want to apply to that specific message
      class_name: 'my-sticky-class'
    });

    return false;
  }
</script>


<!-- created by: MSA Consultancy Company -->
