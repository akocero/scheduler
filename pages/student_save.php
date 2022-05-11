
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

	
	$last = $_POST['last'];	
	$first = $_POST['first'];	
	$mid = $_POST['mid'];
	$lvl = $_POST['lvl'];	
	$prog = $_POST['prog'];	
	$dept = $_POST['dept'];
	$cys = $_POST['cys'];		
	$username =preg_replace('/\s+/','',$first).$last.$dept;	
	$username=strtolower($username);
	$password = preg_replace('/\s+/','',$last);	
	$password=strtolower($password);	
	$status = $_POST['status'];	
					
		$query=mysqli_query($con,"select * from student where student_last='$last' and  student_first='$first'")or die(mysqli_error());
				$count=mysqli_num_rows($query);
				if ($count>0)
				{
					echo "<script type='text/javascript'>alert('Student already exist');</script>";
					echo "<script>document.location='student.php'</script>";  
				}	
				else{
					mysqli_query($con,"INSERT INTO student(student_last,student_first,student_mid,yearlevel,prog_code,dept_code,cys,username,password,status) 
					VALUES('$last','$first','$mid','$lvl','$prog','$dept','$cys','$username','$password','$status')")or die(mysqli_error());
				
					echo "<script type='text/javascript'>
				alert('Successfuly added new member');</script>";	
				echo "<script>document.location='student.php'</script>";  
				}
				  
	
?>