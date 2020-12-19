<?php
    include 'include/topMost.php';
?>
  <title>Faculty Login Page</title>
<?php include 'include/bootstrap.php'?>
</head>

<body>
  <!-- ******* MAIN CONTENT ********* -->
  <center>
    <a href="//" style="font-family:'Kaushan Script', cursive;font-size:20px;">
	<?php echo $siteName ?>
	</a>
	<br><br></center>
	<?php if($_REQUEST["err"] == 1)
	{
	?>
	<div class="alert alert-danger alert-dismissable" style="margin-left:0px;">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Alert!</b> Invalid login credentials. Please enter valid login details.
	</div>
	<?php
	}
	?>
	<?php if($_REQUEST["err"] == 2)
	{
	?>
	<div class="alert alert-danger alert-dismissable" style="margin-left:0px;">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Alert!</b> Account is pending for approval.
	</div>
	<?php
	}
	?>
	<?php if ($_REQUEST["err"]== 3)
	{
	?>
	<div class="alert alert-danger alert-dismissable" style="margin-left:0px;">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Sorry!</b> Your session has expired. please login again.
	</div>
	<?php 
	}
	?>
   <!-- ******* MAIN CONTENT ********* -->
  <div id="login-page">
    <div class="jumbotron">
        <form class="form-login" action="auther.php" method="post">
            <h2 class="form-login-heading">Faculty Login</h2>
            <div class="login-wrap">
              <input type="text" name="adminUserName" class="form-control" placeholder="User Name" required/>
              <br>          
              <input type="password" name="adminPassword" class="form-control" placeholder="Password" required/>
                <button class="btn btn-theme btn-block" type="submit" style="margin-top: 10px;"><i class="fa fa-lock"></i>Log in</button> 
        </form>
    </div>
  </div>
</body>
</html>
