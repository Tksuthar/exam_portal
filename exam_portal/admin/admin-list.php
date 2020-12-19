  <?php
    include  "include/check-session.php" ;
    include "include/databaseConnect.php" ;
    ?>
  <?php include "include/top-most.php" ;?>
  <title>Admin Detail</title>

  <?php include "include/top.php" ;?>
  <?php include "include/navbar.php" ;?>

    <!-- *************MAIN CONTENT*****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" id="facultyList" style="display:inline-block;">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-4">
                      <h4 style="color:black; font-size: 18px">Admin Table</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-4 pull-right">
                      <button class="btn-primary btn" onclick="tableToForm();">Add Admin</button>
                    </div>
                  </div>
                </div>
                <hr>
                <thead>
                  <tr>
                    <th>Admin ID</th>
                    <th>Admin Name</th>
                    <th>Admin EmailId</th>
                    <th>Admin UserName</th>
                    <th>Status</th>
                    <th>View More</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Admin ID</th>
                    <th>Admin Name</th>
                    <th>Admin EmailId</th>
                    <th>Admin UserName</th>
                    <th>Status</th>
                    <th>View More</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_admins");
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
                        <td><?php echo $rows["admin_Id"]?></td>
                        <td><?php echo $rows["admin_Name"]?></td>
                        <td><?php echo $rows["admin_Email"]?></td>
                        <td><?php echo $rows["admin_Username"]?></td>
                        <td><?php echo $status?></td>
                        <td><center><a href="edit-admin.php?id=<?php echo $rows["adminId"]?>"><i class="fa fa-list"></i></a></center></td>
                    </tr>
                    <?php
                    }
                    	$conn='null';
                    	$stmt='null';
                    ?>
                </tbody>
              </table>
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
                  <div class="col-md-4 pull-left">
                    <h4 style="color:black;"><b>Admin Registration Form</b></h4>
                  </div>
                </div>
                <div class="row">
                  <!-- form start -->
                  <div class="col-md-6">

                    <form action="add-admin-process.php" class="needs-validation" method="post" role="form" name="addAdmin" autofocus required>
                      <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Admin Name</label>
                        <input type="text" class="form-control" id="newadminName" placeholder="like John Day" name="newadminName" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Admin Email</label>
                        <input type="email" class="form-control" id="adminEmail" placeholder="name@example.com" name="adminEmail" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Admin Username</label>
                        <input type="text" class="form-control" id="adminUserName" placeholder="like john123" name="adminUserName" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Admin Passwrod</label>
                        <input type="password" class="col-md-2 form-control" id="Password" name="Password" required>
                      </div>
                      <label>Status - </label>
                		<input type="radio" name="status" class="sgrChk" value="1" checked> Active
                		<input type="radio" name="status" value="0"> Inactive
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
  var element = document.getElementById("admin");
  element.classList.add("active");
</script>