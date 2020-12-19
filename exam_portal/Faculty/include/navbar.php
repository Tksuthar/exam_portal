
<body>
  <section id="container">

    <!-- ******* TOP BAR CONTENT & NOTIFICATIONS**********-->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Hide or Display Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>FACULTY<span>PORTAL</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>

    <!--header end-->

    <!-- **********MAIN SIDEBAR MENU*************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="img/ui-sam.png" class="img-circle" width="80"></p>
          <h5 class="centered"><?php echo $_COOKIE["teacher_Name"];?></h5>
          <li class="sub-menu">
          </li>
          <li class="sub-menu">
              <li><a id="task" class="" href="task.php">Task</a></li>
              <li><a id="review" href="review.php">Review</a></li>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
