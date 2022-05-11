<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
$activeSemester = '';
	include('../dist/includes/dbcon.php');
	$semesterQuery=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
	while($row=mysqli_fetch_array($semesterQuery)){
		$activeSemester = $row['sem'];
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Schedule | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="../dist/img/iconlogo.ico">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../dist/css/skins/skin-Maroon.min.css">
	<script src="../dist/js/jquery.min.js"></script>
 </head>
 <style type="text/css">
 	.skin-Maroon .main-header .navbar {
  background-color: #800000;
}
 	.btn-home{
  color: white;
  background-color: #F1C40F;
}
.btn-home:hover,
.btn-home:active,
.btn-home.hover {
  background-color: #F39C12;
  color: white;
}

	.btnsave{
  color: white;
  background-color: #2ECC71;
}
.btnsave:hover,
.btnsave:active,
.btnsave.hover {
  background-color: #27AE60;
  color: white;
}

	.uncheckbtn{
  color: white;
  background-color: #E74C3C;
}
.uncheckbtn:hover,
.uncheckbtn:active,
.uncheckbtn.hover {
  background-color: #C0392B;
  color: white;
}

.form-group2 {
  float: left;
  width: 250px;
  padding: 10px;
  margin-left: 100px;
}
 </style>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-Maroon layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
        

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-12">
              <div class="box box-warning">
              	<div style="text-align: center">
              		<h4>Create Class Schedule <hr>
              		<a href="#searcht" data-target="#searcht" data-toggle="modal" class="dropdown-toggle btn btn-home">
                     
                      Teacher				
                    </a>
                   <a href="#searchclass" data-target="#searchclass" data-toggle="modal" class="dropdown-toggle btn btn-home">
                     
                      Class				
                    </a>
                  
                   <a href="#searchroom" data-target="#searchroom" data-toggle="modal" class="dropdown-toggle btn btn-home">
                     
                      Room				
                    </a>
                    </h4>
                </div> 
              
		<?php
				include('../dist/includes/dbcon.php');
				$query=mysqli_query($con,"select * from time where days='wkdays' order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							
							
		<?php }?>				

		<?php
					include('../dist/includes/dbcon.php');
					$query=mysqli_query($con,"select * from time where days='wkend' order by time_start")or die(mysqli_error());
						
					while($row=mysqli_fetch_array($query)){
							$id=$row['time_id'];
							$start=date("h:i a",strtotime($row['time_start']));
							$end=date("h:i a",strtotime($row['time_end']));
			?>
								 
								
			<?php }?>		
			 <form method="post" id="reg-form">		  
			<table class="table table-bordered table-striped">
							<div class="box-body">
                  <!-- Date range -->
                  <div id="form1">
					

						
						  <div class="row">
						 
						 <div class="form-group2">
							<label for="date">Teacher</label>							
								<select class="form-control select2" name="teacher" required>
								  <?php 
									$query2=mysqli_query($con,"select * from member order by member_last")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
								  <option></option>
										<option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
								  <?php }
									
								  ?>
								</select>							
						  </div><!-- /.form group -->

						  <div class="form-group2">
							<label for="date">Course</label>							
								<select class="form-control select2" name="subject" required>
								  <?php 
									$query2=mysqli_query($con,"select prog_title from program order by prog_title")or die(mysqli_error($con));
									 while($row=mysqli_fetch_array($query2)){
								  ?>

										<option><?php echo $row['prog_title'];?></option>
								  <?php }
									
								  ?>
								</select>							
						  </div><!-- /.form group -->

						  <div class="form-group2">
							<label for="date">Year</label>
							<select class="form-control select2" name="cys" required id="year_select" onchange="getSelectedYear(this.value)">
								 <option></option>
								  <?php 
									$query2=mysqli_query($con,"select * from year_level order by id")or die(mysqli_error($con));
									 while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['yrlevel'];?></option>
								  <?php }
									
								  ?>
							</select>	
						  </div><!-- /.form group -->

						  <div class="form-group2">
							<label for="date">Section</label>
							<select class="form-control select2" name="cys" required>
								  <?php 
									$query2=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error($con));
									 while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['cys'];?></option>
								  <?php }
									
								  ?>
								</select>	
						  </div><!-- /.form group -->

						  <div class="form-group2">
							<label for="date">Room</label>
							<select class="form-control select2" name="room" required>
								  <?php 
									$query2=mysqli_query($con,"select * from room order by room")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['room'];?></option>
								  <?php }
									
								  ?>
								</select>	
						  </div><!-- /.form group -->

						
							<div class="form-group2">
							<label for="date">Subject</label><br>
									<select class="form-control select2" name="subject" required id="subject_select">
										 <?php 
									$query2=mysqli_query($con,"select * from subject where sem = '$activeSemester'")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['subject_title'];?></option>
								  <?php }
									
								  ?>
								</select>	
							  </div>
								
							  <!-- /.form group -->		
							
							  
									
									<div class="form-group2">
							<label for="date">Semester</label><br>
								
							<input type="text" name="sem" id="input_active_semester" value="<?php echo $activeSemester;?>" readonly>
							
							  </div><!-- /.form group -->
									</div>
								

									
										 <div class="row">
										 
							  	<div class="form-group2">
							<label for="date">Class Time</label>
							<select class="form-control select2" name="time" required>
								  <?php 
									$query2=mysqli_query($con,"select * from time order by time_start")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option value="<?php echo $row['time_id'];?>"><?php echo $row['time_start']."-".$row['time_end'];?></option>
								  <?php }
									
								  ?>
								</select>	
						  </div><!-- /.form group -->
							  
				
							  
							  		<div class="form-group2 for-repeating">
							  			<label for="dow" class="control-label">Days of Week</label><br>
												<select name="dow" id="dow" class="form-control select2">
													<option value="m">Monday</option>
													<option value="t">Tuesday</option>
													<option value="w">Wednesday</option>
													<option value="th">Thursday</option>
													<option value="f">Friday</option>
													<option value="sat">Saturday</option>
													<option value="sun">Sunday</option>
											</select>
										</div>
								

									
										</div>	</div></div>		
               </table>  
                  
                   <div>
                    <center>
                 <button class="btnsave" id="daterange-btn" name="save" type="submit">Save</button>
					 			
					  				</center>
					       </div><hr>
					       <div class="result" id="form">
					  		 </div>
					       <hr>
									
					
                  
          </form>
					

                      
                
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	<div id="searcht" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Faculty Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="faculty_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Faculty</label>
					<div class="col-lg-10">
					<select class="select2" name="faculty" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from member order by member_last")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
 
 <div id="searchclass" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Class Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="class_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Class</label>
					<div class="col-lg-10">
					<select class="select2" name="class" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['cys'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
 
 <div id="searchroom" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Room Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="room_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Room</label>
					<div class="col-lg-10">
					<select class="select2" name="room" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from room order by room")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['room'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
	<script type="text/javascript">
	
		$(document).on('submit', '#reg-form', function()
		 {  
		  $.post('submit.php', $(this).serialize(), function(data)
		  {
		   $(".result").html(data);  
		   $("#form1")[0].reset();
		  // $("#check").reset();

		  });
		  
		  return false;
		  
		
		})
</script>
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

	  

	// function generateInfo(resident_id) {
    //         $.ajax({
    //             url: 'functions/ajax_clearance.php',
    //             method: 'POST',
    //             dataType: 'json',
    //             data: {
    //                 key: 'genInfo',
    //                 resident_id: resident_id
    //             },
    //             success: function(response) {
    //                 $('#text_address').html(response.address);
    //                 $('#text_status').val(response.status);
    //                 genAge(response.date_of_birth);
    //             }
    //         });
    // }
	function getSelectedYear(val) {

		var year = $('#year_select option:selected').text();
		$.post("getSubject.php", 
		{ 
		'idcategory' : year,
		 'input_active_semester' : $("#input_active_semester").val()
		},
			
		function(data) {
			var sel = $("#subject_select");
			sel.empty();
			for (var i=0; i<data.length; i++) {
				sel.append('<option>' + data[i].desc + '</option>');
			}
		}, "json");
	}
	


    </script>
  </body>
</html>
