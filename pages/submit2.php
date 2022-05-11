
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
error_reporting(0);
if($_POST)
{
include('../dist/includes/dbcon.php');

	$member = $_POST['teacher'];

	$subject = $_POST['subject'];
	$room = $_POST['room'];
	$cys = $_POST['cys'];
	$remarks = $_POST['remarks'];
	$time = $_POST['time'];
	
	
	

	 $m="Monday";
	 $t="Tuesday";
	 $w="Wednesday";
	 $th="Thursday";
	 $f="Friday";
	 $sat="Saturday";
	 $sun="Sunday";
	
	$set_id=$_SESSION['settings'];
	$program=$_SESSION['id'];
				

		if(isset($_POST['dow'])){
			
			$selected = $_POST['dow'];
		
	switch ($selected) {
		case 'm':
			//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Monday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Monday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Monday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	

				
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Monday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
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
			break;
		case 't':
			//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Tuesday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Tuesday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Tuesday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Tuesday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Tuesday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Tuesday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Tuesday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>Tuesday</td>
					<td>$timet</td> 					
					<td>Success</td>					
				</tr>
			</table></span><br>";
		
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
		break;

		case 'w':
			$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Wednesday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Wednesday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Wednesday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Wednesday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Wednesday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Wednesday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Wednesday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>Wednesday</td>
					<td>$timet</td> 					
					<td>Success</td>					
				</tr>
			</table></span><br>";
		
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
		break;

		case 'th':
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Thursday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Thursday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Thursday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Thursday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Thursday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Thursday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Thursday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>Thursday</td>
					<td>$timet</td> 					
					<td>Success</td>					
				</tr>
			</table></span><br>";
		
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
		break;

		case 'f':
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Friday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Friday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Friday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Friday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Friday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Friday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Friday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>Friday</td>
					<td>$timet</td> 					
					<td>Success</td>					
				</tr>
			</table></span><br>";
		
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
		break;

		case 'sat':
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Saturday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Saturday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Saturday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Saturday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Saturday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Saturday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Saturday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>Saturday</td>
					<td>$timet</td> 					
					<td>Success</td>					
				</tr>
			</table></span><br>";
		
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
		break;

		case 'sun':
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$time' and day='Sunday'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Sunday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$time' and day='Sunday'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Sunday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$time' and day='Sunday'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Sunday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];

			
		$querytime=mysqli_query($con,"select * from time where time_id='$time'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$time','Sunday','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>Sunday</td>
					<td>$timet</td> 					
					<td>Success</td>					
				</tr>
			</table></span><br>";
		
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
		break;

		default:
			// code...
			break;
	}

	}
					
		  
	
	



}

?>