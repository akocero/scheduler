<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$room = $_POST['room'];			
					
	$query=mysqli_query($con,"select * from room where room='$room'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('Room already added!');</script>";	
				echo "<script>document.location='room.php'</script>";  
			}
			else
			{	
		
			mysqli_query($con,"INSERT INTO room(room) 
				VALUES('$room')")or die(mysqli_error());
			}			
				echo "<script type='text/javascript'>alert('Successfully added a room!');</script>";	
				echo "<script>document.location='room.php'</script>";  
	
}					  
	
?>