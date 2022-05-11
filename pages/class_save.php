 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

	$cys = $_POST['class'];			
					
	$query=mysqli_query($con,"select * from cys where cys='$cys'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('Class already added!');</script>";	
				echo "<script>document.location='class.php'</script>";  
			}
			else
			{	
				mysqli_query($con,"INSERT INTO cys(cys) 
				VALUES('$cys')")or die(mysqli_error());
			}	
				echo "<script type='text/javascript'>alert('Successfully added a class!');</script>";	
				echo "<script>document.location='class.php'</script>";  
		
					  
	
?>