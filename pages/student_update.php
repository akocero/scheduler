
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$last = $_POST['last'];	
	$first = $_POST['first'];	
	$mid = $_POST['mid'];
	$lvl= $_POST['yearlevel'];	
	$prog = $_POST['prog'];	
	$dept = $_POST['dept'];	
	$status =$_POST['status'];
	$username=strtolower($first.$last.$dept);
	
	mysqli_query($con,"update student set student_last='$last',student_first='$first',student_mid='$mid',yearlevel='$lvl',prog_code='$prog',dept_code='$dept',username='$username',status='$status' where student_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated student details!');</script>";
	echo "<script>document.location='student.php'</script>";

	
?>
