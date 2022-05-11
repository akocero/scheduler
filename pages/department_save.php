<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');

	$code = $_POST['code'];		
	$name = $_POST['name'];			
			

	$query=mysqli_query($con,"select * from dept where dept_code='$code'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('Program already added!');</script>";	
				echo "<script>document.location='department.php'</script>";  
			}	
			else
			{	
			mysqli_query($con,"INSERT INTO dept(dept_code,dept_name) 
				VALUES('$code','$name')")or die(mysqli_error());
				}
			echo "<script type='text/javascript'>alert('Successfully added a department!');</script>";	
			echo "<script>document.location='department.php'</script>";  
	
}					  
	
?>