
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include("../dist/includes/dbcon.php");
$id=$_REQUEST['id'];
$result=mysqli_query($con,"DELETE FROM student WHERE student_id ='$id'")
	or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully deleted a faculty!');</script>";	
	echo "<script>document.location='student.php'</script>";  
?>