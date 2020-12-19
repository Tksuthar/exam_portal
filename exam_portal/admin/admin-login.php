<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin Login</title>

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
    <center>
    <a href="//" style="font-family:'Kaushan Script', cursive;font-size:20px;">
	<?php echo $siteName ?>
	</a>
	<!-- <img src="" alt="CashMeBack logo" width="150px"> -->
	<br><br></center>
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
   <!-- ******* MAIN CONTENT ********* -->
  <div id="login-page">
    <div class="jumbotron">
        <form class="form-login" action="auther.php" method="post">
            <h2 class="form-login-heading">ADMIN LOGIN</h2>
            <div class="login-wrap">
              <input type="text" name="adminUserName" class="form-control" placeholder="User Name" autofocus required/>
              <br>
              <input type="password" name="adminPassword" class="form-control" placeholder="Password" required/>
<button class="btn btn-theme btn-block" type="submit" style"margin-top:10px;"="" style="margin-top: 10px;"><i class="fa fa-lock"></i>Log in</button>              <hr>
            </div>
        </form>
    </div>
  </div>
</body>

</html>
