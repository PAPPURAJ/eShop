<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#about_desc' });</script>
  
<?php

$get_about_us = "select * from about_us";

$run_about_us = mysqli_query($con,$get_about_us);

$row_about_us = mysqli_fetch_array($run_about_us);

$about_heading = $row_about_us['about_heading'];

$about_short_desc = $row_about_us['about_short_desc'];

$about_desc = $row_about_us['about_desc'];

?> 

<div class="row" >

<div class="col-lg-12" >

<ol class="breadcrumb">

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit About Us Page

</li>

</ol>

</div>

</div>

<div class="row">

<div class="col-lg-12">

<div class="panel panel-default">

<div class="panel-heading">

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit About Us Page

</h3>

</div>

<div class="panel-body">

<form method="post" class="form-horizontal">

<div class="form-group">

<label class="col-md-3 control-label"> About Us Heading : </label>

<div class="col-md-8">

<input type="text" name="about_heading" class="form-control" value="<?php echo $about_heading; ?>">

</div>

</div>


<div class="form-group">

<label class="col-md-3 control-label"> About Us Short Description : </label>

<div class="col-md-8">

<textarea name="about_short_desc" class="form-control" rows="5">

<?php echo $about_short_desc; ?>

</textarea>

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> About Us Description : </label>

<div class="col-md-8">

<textarea name="about_desc" id="about_desc" class="form-control" rows="10">

<?php echo $about_desc; ?>

</textarea>

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> </label>

<div class="col-md-8">

<input type="submit" name="submit" value="Update About Us Page" class="btn btn-primary form-control">

</div>

</div>

</form>

</div>

</div>

</div>

</div>

<?php

if(isset($_POST['submit'])){

$about_heading = $_POST['about_heading'];

$about_short_desc = $_POST['about_short_desc'];

$about_desc = $_POST['about_desc'];

$update_about_us = "update about_us set about_heading='$about_heading',about_short_desc='$about_short_desc',about_desc='$about_desc'";

$run_about_us = mysqli_query($con,$update_about_us);

if($run_about_us){

echo "<script>alert('About Us Page Has Been Updated')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}

}

?>


<?php } ?>