<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Members | <?php include('../dist/includes/title.php');?></title>
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
 <style type="text/css">
  .btn1{
  color: white;
  background-color: #2980B9 ;
}
.btn1:hover,
.btn1:active,
.btn1.hover {
  background-color: #1A5276;
  color: white;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 3; /* Sit on top */
  padding-top: 210px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
   
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
               <form method="post" id="reg-form" action="student_save.php">
                <div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table id="example1" class="table table-bordered table-striped" style="margin-right:-10px">
              <thead>
                <tr>
                
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Year Level</th>
                <th>Program</th>
                <th>Department</th>
                <th>Section</th> 

                <th>Status</th>
                <th>Action</th>

                </tr>
              </thead>
              
    <?php
        include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from student order by prog_code")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id=$row['student_id'];
            $last=$row['student_last'];
            $last=ucwords($last);
            $first=$row['student_first'];
             $first=ucwords($first);
            $mid=$row['student_mid'];
             $mid=ucwords($mid);
            $lvl=$row['yearlevel'];
            $prog=$row['prog_code'];
            $dept=$row['dept_code'];
            $cys=$row['cys'];
            $username=$row['username'];
            $password=$row['password'];
            $status=$row['status'];
    ?>
                <tr>
                <td><?php echo $last;?></td>
                <td><?php echo $first;?></td>
                <td><?php echo $mid;?></td>
                <td><?php echo $lvl;?></td>
                <td><?php echo $prog;?></td>
                <td><?php echo $dept;?></td>
                <td><?php echo $cys;?></td>

                <td><?php echo $status;?></td>
                <td>
                  <a id="click" href="student_edit.php?id=<?php echo $id;?>">
                    <i class="glyphicon glyphicon-edit text-blue"></i></a>
                  <a id="removeme" href="student_del.php?id=<?php echo $id;?>">
                    <i class="glyphicon glyphicon-trash text-red"></i></a>
                  
                </td>
        
                </tr>

              
<?php }?>           
</table>  
							  
		</div><!--col end -->
		<div class="col-md-6">
			
						
         </div><!--col end-->           
        </div><!--row end-->        
					
			
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            

             <!-- Trigger/Open The Modal -->
<abbr title="click this to register the student"><button class="adminbutton" id="myBtn">Register Student</button></abbr>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content animate">
    <span class="close">&times;</span>
    <form action="student.php" method="post">

              <label for="date">Last Name</label><br>
                <input type="text" class="form-control" name="last" placeholder="Last Name" required> 
              
              <label for="date">First Name</label><br>
                <input type="text" class="form-control" name="first" placeholder="First Name" required> 
              
              <label for="date">Middle Name</label><br>
                <input type="text" class="form-control" name="mid" placeholder="Middle Name"> 
             
              <label for="date">Year Level</label><br>
                <input type="text" class="form-control" name="lvl" placeholder="Year level" required> 
              <br>
              <div class="form-group">
              <label for="date">Program/Course</label>
              
                <select class="form-control select2" style="width:42%" name="prog" required>
                  <?php 
                  $query2=mysqli_query($con,"select * from program order by prog_code")or die(mysqli_error($con));
                    while($row=mysqli_fetch_array($query2)){
                  ?>
                    <option value="<?php echo $row['prog_code'];?>"><?php echo $row['prog_title'];?></option>
                  <?php }
                  
                  ?>
                </select>
              </div>
            <div class="form-group">
              <label for="date">Department</label>
              
                <select class="form-control select2" style="width:45%" name="dept" required>
                  <?php 
                  $query2=mysqli_query($con,"select * from dept order by dept_code")or die(mysqli_error($con));
                    while($row=mysqli_fetch_array($query2)){
                  ?>
                    <option value="<?php echo $row['dept_code'];?>"><?php echo $row['dept_name'];?></option>
                  <?php }
                  
                  ?>
                </select>
              
              </div>

               <div class="form-group">
              <label for="date">Section</label>
              
                <select class="form-control select2" style="width:42%" name="cys" required>
                  <?php 
                  $query2=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error($con));
                    while($row=mysqli_fetch_array($query2)){
                  ?>
                    <option value="<?php echo $row['cys'];?>"><?php echo $row['cys'];?></option>
                  <?php }
                  
                  ?>
                </select>
              </div>

               <div class="form-group">
              <label for="date">Status</label>
              
                <select class="form-control select2" name="status" required>
                    <option>regular</option>
                    <option>irregular</option>
                    <option>unenrolled</option>
                </select>
              </div>
                  <center>
                    
                      <button class="btn1" id="daterange-btn" name="save" type="submit">
                        Save
                      </button>
            <button class="btn1" id="daterange-btn" type="reset">
                       Cancel
                      </button>
            </center>
  </form>
  </div>
        </div>
            
					  
                   </div>
                  </div><!-- /.form group --><hr>
				</form>	
                </div><!-- /.box-body -->
				
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->



<script type="text/javascript">// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}</script>

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
