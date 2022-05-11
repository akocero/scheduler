<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$room =$_POST['room'];
	
	mysqli_query($con,"update room set room='$room' where room_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated a room!');</script>";	
	echo "<script>document.location='room.php'</script>";  
}	
	
?>
