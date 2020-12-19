<?php
    include  "include/check-session.php" ;
    include "include/databaseConnect.php" ;
?>
<?php
  include "include/top-most.php" ;?>
  <title>Faculty Detail</title>
 <?php
    include "include/top.php";
    include "include/navbar.php";
  ?>

    <!-- *************MAIN CONTENT*****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" id="facultyList" style="display:inline-block;">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <div class="row">
                <div class="col-md-2 pull-left">
                  <h4 style="color:black; font-size: 18px">Faculty Table</h4>
                </div>
                <div class="col-md-2 pull-right" style="margin-right: 5px;">
                  <button class="btn-primary btn" onclick="tableToForm();">Add Faculty</button>
                </div>
              </div>
              <div style="overflow-x:auto;">
                <table class="table table-striped table-advance table-hover">
                  <thead>
                    <tr>
                      <th>Faculty ID</th>
                      <th>Faculty Name</th>
                      <th>Faculty EmailId</th>
                      <th>Faculty UserName</th>
                       <th>Status</th>
                      <th>View More</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Faculty ID</th>
                      <th>Faculty Name</th>
                      <th>Faculty EmailId</th>
                      <th>Faculty UserName</th>
                      <th>Status</th>
                      <th>View More</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                      $stmt = $conn->prepare("select * from tbl_teacher");
                      $stmt->execute();
                      while($rows = $stmt->fetch())
                      {
                      $status = $rows["status"];

                      if( $status == 0)
                      {
                          $status = "Inactive";
                      }
                      else
                      {
                          $status = "Active";
                      }
                      ?>
                      <tr>
                          <td><?php echo $rows['teacher_Id']?></td>
                          <td><?php echo $rows["teacher_Name"]?></td>
                          <td><?php echo $rows["teacher_Email"]?></td>
                          <td><?php echo $rows["teacher_Username"]?></td>
                          <td><?php echo $status ?></td>
                          <td><center><a href="edit-faculty.php?id=<?php echo $rows["teacher_Id"]?>"><i class="fa fa-list"></i></a></center></td>
                      </tr>
                      <?php
                      }
                          $stmt->null;
                          $conn->null;
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

      <!-- admin registration form start -->
      <section class="wrapper" id="registrationForm" style="display:none">
        <div class="row mt" >
          <div class="col-md-12">
            <div class="content-panel">
                <div class="row">
                  <h4 style="color:black; font-size: 21px; text-align: center;"><b><strong>Faculty Registration Form</strong></b></h4>
                </div>
                <div class="row">
                  <!-- form start -->
                    <form method="post" action="add-faculty-process.php" class="needs-validation" method="post" role="form" name="addFaculty">
                      <div class="col-md-6">
                        <div class="form-group col-md-12">
                          <label for="exampleFormControlInput1" style="color:black; font-size: 15px">Faculty Name</label>
                          <input type="text" class="form-control" name="facultyName" placeholder="faculty name" autofocus required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="exampleFormControlInput1" style="color:black; font-size: 15px">Faculty Email</label>
                          <input type="email" class="form-control" name="facultyEmail" placeholder="name@example.com"autofocus required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="exampleFormControlInput1" style="color:black; font-size: 15px">Faculty Username</label>
                          <input type="text" class="form-control" name="facultyUserName" placeholder="like admin123" autofocus required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="exampleFormControlInput1" style="color:black; font-size: 15px">Faculty Passwrod</label>
                          <input type="password" class="col-md-2 form-control" name="Password" autofocus required>
                        </div>
                        <label>Status - </label>
                		<input type="radio" name="status" class="sgrChk" value="1" checked> Active
                		<input type="radio" name="status" value="0"> Inactive
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-12">
                          <label for="exampleFormControlSelect1"><p style="color:black; font-size: 15px">Assign Subjects</p></label>

                          <?php
                            $stmt = $conn->prepare("select * from tbl_subjects");
                            $stmt->execute();
                            while($rows = $stmt->fetch())
                            {
                            $subject_id	= $rows["subject_Id"];
                            $subject_name = $rows["subject_name"];
                            ?>
                            <div class="checkbox" >
                            	<label>
                            		<input type="checkbox" name="subject[]" class="sgrCheck" value="<?php echo $subject_id;?>" >&nbsp;&nbsp; <?php echo strtoupper($subject_name)
                            		?>
                            	</label>
                            </div>
                            <?php
                            }
                            $stmt=null;
                            $conn=null;	?>

                          <div class="row" style="padding-top: 20px;">
                            <div class="col-md-4">
                              <button class="btn-success btn" name="submit">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- form end -->
                </div>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- admin registration form end -->

    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

<?php
    include "include/footer.php"
;?>

<script type="text/javascript">
  var element = document.getElementById("faculty");
  element.classList.add("active");
</script>

<!-- created by: MSA Consultancy Company -->
