<?php
    include  "include/check-session.php" ;
    include "include/databaseConnect.php" ;
?>

<?php
  include "include/top-most.php" ;?>
  <title>Admin: Exam Portal</title>
 <?php
    include "include/top.php" ;?>
    <?php
    include "include/navbar.php" ;?>

    <!-- *************MAIN CONTENT*****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" id="facultyList" style="display:inline-block;">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <div class="row">
                <div class="col-md-2 pull-left">
                  <h4 style="color:black; font-size: 18px">Subjet Table</h4>
                </div>
                <div class="col-md-2 pull-right" style="margin-right: 5px;">
                  <button class="btn-primary btn" onclick="tableToForm();">Add Subjet</button>
                </div>
              </div>
              <div style="overflow-x:auto;">
                <table class="table table-striped table-advance table-hover">
                  <thead>
                    <tr>
                      <th>Subject ID</th>
                      <th>Subject Name</th>
                      <th>View More</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Subject ID</th>
                      <th>Subject Name</th>
                      <th>View More</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                      $stmt = $conn->prepare("select * from tbl_subjects");
                      $stmt->execute();
                      while($rows = $stmt->fetch())
                      {
                      ?>
                      <tr>
                          <td><?php echo $rows["subject_Id"]?></td>
                          <td><?php echo $rows["subject_name"]?></td>
                          <td><a href="edit-admin.php?id=<?php echo $rows["subject_Id"]?>"><i class="fa fa-list"></i></a></td>
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

      <!-- subject registration form start -->
      <section class="wrapper" id="registrationForm" style="display:none">
        <div class="row mt" >
          <div class="col-md-12">
            <div class="content-panel">
                <div class="row">
                  <div class="col-md-4 pull-left">
                    <h4 style="color:black;"><b>Add New Subjet</b></h4>
                  </div>
                </div>
                <div class="row">
                  <!-- form start -->
                  <div class="col-md-6">

                    <form action="add-subject-process.php" class="needs-validation" method="post" role="form" name="addSubject">
                      <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Subject Name</label>
                        <input type="text" class="form-control" name="subName" placeholder="like Hindi">
                      </div>
                      <div class="form col-md-12">
                        <div class="row">
                          <div class="col-md-4">
                            <button class="btn-success btn" name="submit">Submit</button>
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

<?php include "include/footer.php" ;?>
<!-- created by Tarun Kumar & Mudit Singhal -->
<script type="text/javascript">
  var element = document.getElementById("subject");
  element.classList.add("active");
</script>