
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
error_reporting(0);
if($_POST)
{
include('../dist/includes/dbcon.php');

	$irregular = $_POST['student'];

	$subject = $_POST['subject'];
	$room = $_POST['room'];
	$cys = $_POST['cys'];
	$remarks = $_POST['remarks'];
	
	$m = $_POST['m'];
	$w = $_POST['w'];
	$f = $_POST['f'];
	$t = $_POST['t'];
	$th = $_POST['th'];
	$sat = $_POST['sat'];
	$sun = $_POST['sun'];
	
	$set_id=$_SESSION['settings'];
	$program=$_SESSION['id'];
					
	//monday sched
	foreach ($m as $daym){
		//check conflict for irregular
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='m'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>monday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$studentt=$rowt['student_last'].", ".$rowt['student_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','m','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	//------------------------------------------------
	//wednesday sched
	foreach ($w as $daym){
		//check conflict for member
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='w'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>wendnesday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$studentt=$rowt['student_last'].", ".$rowt['student_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','w','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>wednesday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	
	//-------------------------------------------------------------
	//friday sched
	foreach ($f as $daym){
		//check conflict for member
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='f'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>friday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$studentt=$rowt['member_last'].", ".$rowt['member_first'];
		

		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','f','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>friday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	//------------------------------------------------
	//tuesday sched
	foreach ($t as $daym){
		//check conflict for member
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='t'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>tuesday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
			
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$studentt=$rowt['student_last'].", ".$rowt['student_first'];
			

		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','t','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>tuesday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	
	//--------------------------------------------------
	//thursday sched
	foreach ($th as $daym){
		//check conflict for member
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='th'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>thursday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$studentt=$rowt['student_last'].", ".$rowt['student_first'];
			

		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','th','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>thursday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	//------------------------------------------------
	//saturday sched
	foreach ($sat as $daym){
		//check conflict for member
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='sat'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>saturday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['student_last'].", ".$rowt['student_first'];
			


		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','sat','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>saturday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	//------------------------------------------------
	//sunday sched
	foreach ($sun as $daym){
		//check conflict for member
		$query_ireg=mysqli_query($con,"select *,COUNT(*) as count from scheduleireg 
		natural join student natural join time where student_id='$irregular' and scheduleireg.time_id='$daym' and day='sun'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_ireg);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$student1=$row['student_last'].", ".$row['student_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>sunday</td>
					<td>$time1</td> 
					<td>$student1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		
				
		$queryt=mysqli_query($con,"select * from student where student_id='$irregular'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$studentt=$rowt['student_last'].", ".$rowt['student_first'];
			


		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO scheduleireg(time_id,day,student_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','sun','$irregular','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>sunday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
		
}					  
	
?>