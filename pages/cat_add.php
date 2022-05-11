 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');

	$cat = $_POST['category'];
	
			
			mysqli_query($con,"INSERT INTO category(cat_name) VALUES('$cat')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
					  echo "<script>document.location='category.php'</script>";  
	
?>