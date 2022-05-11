
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
	
	$m = $_POST['m'];
	$w = $_POST['w'];
	$f = $_POST['f'];
	$t = $_POST['t'];
	$th = $_POST['th'];
	$sat = $_POST['sat'];
	$sun = $_POST['sun'];
	
	$id = $_POST['id'];
	
	$set_id=$_SESSION['settings'];
	$program=$_SESSION['id'];
					
	//monday sched
	foreach ($m as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='m' and sched_id<>'$id'")or die(mysqli_error($con));
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
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='m' and sched_id<>'$id'")or die(mysqli_error($con));
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
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='m' and sched_id<>'$id'")or die(mysqli_error($con));
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
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='m',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

			/*mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by) 
				VALUES('$daym','m','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error());*/
				
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
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='w' and sched_id<>'$id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>wendnesday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='w' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>wednesday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='w' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>wednesday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='w',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));
				
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
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='f' and sched_id<>'$id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>friday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='f' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>friday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='f' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>friday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='f',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));
				
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
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='t' and sched_id<>'$id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>tuesday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='t' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>tuesday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='t' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>tuesday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='t',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));
				
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
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='th' and sched_id<>'$id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>thursday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='th' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>thursday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='th' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>thursday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='th',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));
				
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
	//--------------------------------------------------
	//saturday sched
	foreach ($sat as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='sat' and sched_id<>'$id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>saturday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='sat' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>saturday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='sat' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>saturday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='sat',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));
				
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
	//--------------------------------------------------
	//sunday sched
	foreach ($sun as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='sun' and sched_id<>'$id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>sunday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='sun' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>sunday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='sun' and sched_id<>'$id'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>sunday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"update schedule set time_id='$daym',day='sun',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));
				
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