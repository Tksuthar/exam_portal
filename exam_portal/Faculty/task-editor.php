<?php
	include 'include/topMost.php';
?>
<title>Create Paper</title>
<?php
	include 'include/top.php';
	include 'include/navbar.php';
	$id = $_REQUEST["id"];
    if($id == null || !is_numeric($id))
    {
    	$conn=null;
    	header("location:admins.php?err=1");
    	exit;
    }
	?>
	<section>
    <!-- *************MAIN CONTENT*****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" id="facultyList" style="display:inline-block;">
        <div class="row mt">
          <div class="col-md-12">

            <!-- content panel start -->
            <div class="content-panel">
              <div class="jubotron justify-content-center">
              <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
              <form method="post" action="editor-process.php">
                <input type="hidden" name="id" value=<?php echo $id ?>>
                <div class="row" style="padding-left:20px;">
                  <textarea name="editor" id="editor" rows="10" cols="80"></textarea>
                  <div class="col-md-2">
                    <button class="btn-success btn mt" style="align-items: center;" type="submit" name="Submit" onclick="getContent();">Submit</button>
                  </div>
                </div>
              </form>
              <button class="link mt" style="margin-left: 10PX;"><a href="task.php">Go to the task manu</a></button>
              </div>
            </div>
            <!-- /content-panel end -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
	<?php
	include 'include/footer.php';
?>
<script>
  CKEDITOR.replace( 'editor', {
                uiColor: '#14B8C4',
                width:['98%'],
    height:['400px']

            });

  function getContent(){
    var editorText = CKEDITOR.instances.editor.getData();
  }

</script>

<script type="text/javascript">
  var element = document.getElementById("task");
  element.classList.add("active");
</script>
