<?php session_start();

include('dist/includes/dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);

/*$pass=md5($pass1);
$salt="a1Bz20ydqelm8m1wql";
$pass=$salt.$pass;*/

$query=mysqli_query($con,"select * from member where username='$user' and password='$pass'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
           
           $name=$row['member_salut']." ".$row['member_first']." ".$row['member_last'];
           $counter=mysqli_num_rows($query);
           $id=$row['member_id'];
           $status=$row['status'];
	  	if ($counter == 0) 
		  {	
		  echo "<script type='text/javascript'>alert('Invalid Username or Password!');
		  document.location='index.php'</script>";
		  } 
	  else
		  {

	  	$query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);		
	
		$_SESSION['settings']=$row['settings_id'];
		$_SESSION['term']=$row['term'];
	  	$_SESSION['id']=$id;	
	  	$_SESSION['name']=$name;	
	  	$_SESSION['type']=$status;	
	  		
		  	if ($status=='admin')
		  		{
				  
				 	echo "<script type='text/javascript'>document.location='pages/allhome.php'</script>";
				 }
			  else
			  {

					echo "<script type='text/javascript'>document.location='../scheduling_student/pages/home.php'</script>";
				}
		  
	 
	
		// echo "<script type='text/javascript'>document.location='pages/home.php'</script>";
	  }
}	 
?>
