<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_manufacturer'])){

$edit_manufacturer = $_GET['edit_manufacturer'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer'";

$run_manufacturer = mysqli_query($con,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$m_id = $row_manufacturer['manufacturer_id'];

$m_title = $row_manufacturer['manufacturer_title'];

$m_top = $row_manufacturer['manufacturer_top'];

$m_image = $row_manufacturer['manufacturer_image'];

$new_m_image = $row_manufacturer['manufacturer_image'];


}


?>

<div class="row">

<div class="col-lg-12">

<ol class="breadcrumb">

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit Manufacturer

</li>

</ol>

</div>

</div>


<div class="row">

<div class="col-lg-12">

<div class="panel panel-default">

<div class="panel-heading">

<h3 class="panel-title">

<i class="fa fa-money fa-fw"> </i> Edit Manufacturer

</h3>

</div>

<div class="panel-body">

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="form-group">

<label class="col-md-3 control-label"> Manufacturer Name </label>

<div class="col-md-6">

<input type="text" name="manufacturer_name" class="form-control" value="<?php echo $m_title; ?>">

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> Show as Top Manufacturers </label>

<div class="col-md-6">

<input type="radio" name="manufacturer_top" value="yes" 
<?php if($m_top == 'no'){}else{ echo "checked='checked'"; } ?> >

<label> Yes </label>

<input type="radio" name="manufacturer_top" value="no" 
<?php if($m_top == 'no'){ echo "checked='checked'"; }else{} ?> >

<label> No </label>

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> Select Manufacturer Image </label>

<div class="col-md-6">

<input type="file" name="manufacturer_image" class="form-control" >

<br>

<img src="other_images/<?php echo $m_image; ?>" width="70" height="70">

</div>

</div>

<div class="form-group">

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" class="form-control btn btn-primary" value=" Update Manufacturer " >

</div>

</div>

</form>

</div>

</div>

</div>

</div>

<?php

if(isset($_POST['update'])){

$manufacturer_name = $_POST['manufacturer_name'];

$manufacturer_top = $_POST['manufacturer_top'];

$manufacturer_image = $_FILES['manufacturer_image']['name'];

$tmp_name = $_FILES['manufacturer_image']['tmp_name'];

move_uploaded_file($tmp_name,"other_images/$manufacturer_image");

if(empty($manufacturer_image)){

$manufacturer_image = $new_m_image;

}

$update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top',manufacturer_image='$manufacturer_image' where manufacturer_id='$m_id'";

$run_manufacturer = mysqli_query($con,$update_manufacturer);

if($run_manufacturer){

echo "<script>alert('Manufacturer Has Been Updated')</script>";

echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

}

}

?>

<?php } ?>