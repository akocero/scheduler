<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<script src="../dist/js/jquery.min.js"></script>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-yellow layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <?php include('../dist/includes/header_faculty.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
        

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-12">
              <div class="box box-warning">
              	 
               <form method="post" id="reg-form">
                <div class="box-body">
				<div class="row">
					<div class="col-md-6">
							<table class="table table-bordered table-striped">
							

							<thead>
							  <tr>
								<th class="first">Time</th>
								<th>M</th>
								<th>W</th>
								<th>F</th>
								
							  </tr>
							</thead>
							
		<?php
				include('../dist/includes/dbcon.php');
				$member=$_SESSION['id'];
				$sid=$_SESSION['settings'];
				$query=mysqli_query($con,"select * from time where days='mwf' order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
								<td class="first"><?php echo $start."-".$end;?></td>
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='m' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='w' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='f' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								
							  </tr>
							
		<?php }?>					  
		</table>    
		</div>
		<div class="col-md-6">
			<table class="table table-bordered table-striped">
								<thead>
								  <tr>
									<th class="first">Time</th>
									<th>T</th>
									<th>TH</th>
									<th>Sat</th>
									<th>Sun</th>
									
								  </tr>
								</thead>
								
			<?php
					
					$query=mysqli_query($con,"select * from time where days='tth' order by time_start")or die(mysqli_error());
						
					while($row=mysqli_fetch_array($query)){
							$id=$row['time_id'];
							$start=date("h:i a",strtotime($row['time_start']));
							$end=date("h:i a",strtotime($row['time_end']));
			?>
								  <tr >
								<td class="first"><?php echo $start."-".$end;?></td>
								
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='t' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='th' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='sat' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								<td><?php 
									$query1=mysqli_query($con,"select * from schedule natural join member where day='sun' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{

											echo $row1['subject_code'];
											echo "<br>";
											echo "$row1[cys]";
											echo "<br>";
											echo "Room ".$row1['room'];
											echo "<br>";
											echo $row1['remarks'];
											
										}	
									?>
								</td>
								
								
							  </tr>
								
			<?php }?>			
							 <tr>
							 	<td><a href="faculty_class_sched.php?id=<?php echo $member;?>" class="btn btn-primary">Print Class Schedule</a></td>	
							 </tr>			  
			</table> 			
         </div><!--col end-->           
        </div><!--row end-->        
					
			
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
           
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	
 </div>
 
<script>
$(".uncheck").click(function () {
			$('input:checkbox').removeAttr('checked');
});
</script>
	
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
