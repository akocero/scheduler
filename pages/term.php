<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$sem = $_POST['sem'];
	$id=$_SESSION['settings'];
	mysqli_query($con,"update settings set sem='$sem' where settings_id='$id'")or die(mysqli_error());

	$_SESSION['sem']=$sem;

	echo "<script type='text/javascript'>alert('Successfully set the Semester!');</script>";
	echo "<script>document.location='settings.php'</script>";  
	
?>
