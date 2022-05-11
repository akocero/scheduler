<div style="clear:both;"><br></div>  
<span>Prepared by:</span><br><br>
<?php 
			include('../dist/includes/dbcon.php');
			$id=$_SESSION['id'];
			$query=mysqli_query($con,"select * from signatories natural join member natural join designation where seq='1' and set_by='$id'")or die(mysqli_error($con));
				 $row=mysqli_fetch_array($query);
				 echo "<span>$row[member_first] $row[member_last]</span><br>";
				 echo "<span>$row[designation_name]</span>";
?>
<br><br>
<span>Recommending Approval:</span><br><br>
<?php 
			$query=mysqli_query($con,"select * from signatories natural join member natural join designation where seq='2' and set_by='$id'")or die(mysqli_error($con));
				 $row=mysqli_fetch_array($query);
				 
				
			$query=mysqli_query($con,"select * from signatories natural join member natural join designation where seq='3' and set_by='$id'")or die(mysqli_error($con));
				 $row1=mysqli_fetch_array($query);
				 echo "<span>$row[member_first] $row[member_last]</span>";
				 echo "<span style='position:absolute;left:400px'>$row1[member_first] $row1[member_last]</span><br>";
				 echo "<span>$row[designation_name]</span>";
				 echo "<span style='position:absolute;left:400px'>$row1[designation_name]</span>";
?>
<br><br>
<span>Approved:</span><br><br>
<?php 
			
			$query=mysqli_query($con,"select * from signatories natural join member natural join designation where seq='4' and set_by='$id'")or die(mysqli_error($con));
				 $row=mysqli_fetch_array($query);
				 echo "<span>$row[member_first] $row[member_last]</span><br>";
				 echo "<span>$row[designation_name]</span>";
?>