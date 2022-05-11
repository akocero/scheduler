 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
	include('../dist/includes/dbcon.php');

	$start = $_POST['start'];
	$end = $_POST['end'];
	
	$startCount=checkIfTimeIsValid($con, $start);
	
	if ($startCount>0)
	{
		alertError("start error"); 
	}
	else
	{
		$endCount= checkIfTimeIsValid($con, $end);

		if($endCount>0){
			alertError("end error"); 
		}else{

			$rangeCount = checkIfTimeIsInRange($con, $start, $end);

			if($rangeCount>0) {
				alertError("range error"); 
			}else{
				mysqli_query($con,"INSERT INTO time(time_start,time_end) 
				VALUES('$start','$end')")or die(mysqli_error());
				echo "<script type='text/javascript'>alert('Successfully added time!');</script>";	
				echo "<script>document.location='time.php'</script>";
			}
		}	 
	}
}

function checkIfTimeIsValid($con, $time) {
	// Cheking if the time is in range of timesart and timeend from db
	$query=mysqli_query($con,"select * from time where time_start < '$time' and time_end > '$time'")or die(mysqli_error());
	$count=mysqli_num_rows($query);
	return $count;
}

function checkIfTimeIsInRange($con, $start, $end) {
	// Cheking if the time start and time end is in range of time in db
	$query=mysqli_query($con,"select * from time where time_start > '$start' and time_end < '$end'")or die(mysqli_error());
	$count=mysqli_num_rows($query);
	return $count;
}

function alertError($message) {
	// alert/display error 
	echo "<script type='text/javascript'>alert('$message');</script>";	
	echo "<script>document.location='time.php'</script>"; 
	return;
}
	
?>	