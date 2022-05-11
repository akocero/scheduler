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
    <link rel="stylesheet" type="text/css" href="../dist/css/column1.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/slideshow.css">
   <!--<link rel="stylesheet" type="text/css" href="../dist/css/style.css"> -->
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

/* Header/Logo Title */
.header {
  padding: 15px;
  text-align: left;
  background: #800000;
  color: white;
  font-size: 25px;
  height: 100px;

}

.Head
    {
      padding: 5px;
      text-align: center;
      color: #3498DB;
      font-size: 50px;  
      background-color: #333;   
    }
  
  .para
    {
      color: #631E16;
    } 
  .myDiv
     {
     line-height: 50px; 
    text-align: center;
    }
    
h3.hh {
  color: #800000;
}
h4.hh4{
  margin-left: 100px;
  margin-top: 35px;
  font-size: 24px;
  font-weight: bold;
}

 </style>

  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-Maroon layout-top-nav" style="background: #800000;" onload="myFunction()">
    <div class="header">
  <h4 class="hh4">Colegio de san Gabriel Arcangel, inc.</h4>
  <p></p>
</div>
<hr style= "height:4px;border-width:0;color:#E1C16E;background-color:#E1C16E;margin: 0;">

    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
        

      
          
    <div class="column side">
      <center><h3 class="hh">Mission</h3>
      <p>CDSGA commits itself to give AFFORDABLE, TRANSFORMATIVE, PSYCHOLOGICALLY INNOVATIVE, QUALITY EDUCATION and a CARING SERVICE that makes a difference towards self-actualization."
      </p>
      </center>
    </div>
  
  <div class="column middle">
    <h2>Main Content</h2>
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 7</div>
  <center><img src="../dist/img/enrol.jpg" width="590" height="400"></center>
 
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 7</div>
  <center><img src="../dist/img/cdsga1.jpg" width="590" height="400"></center>

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 7</div>
  <center><img src="../dist/img/cdsga2.jpg" width="590" height="400"></center>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 7</div>
  <center><img src="../dist/img/free.jpg" width="590" height="400"></center>
 
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 7</div>
  <center><img src="../dist/img/heal.jpg" width="590" height="400"></center>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 7</div>
  <center><img src="../dist/img/gate.jpg" width="590" height="400"></center>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">7 / 7</div>
  <center><img src="../dist/img/cdsga3.jfif" width="590" height="400"></center>
  
</div>

</div>
<br>
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>    
</div>
  </div>
  

  <div class="column side">
    <center>
      <h3 class="hh">Vission</h3>
         <p>Man of God - Vir Enim Dei. <br>
           A leading transformational leadership institution with a unique Gabrielian culture of Discipline, Socially Responsible, Interdependent, Functionally Productive, Godly Individuals and reaching the marginalized to thrive in the global community.
         </p>
    </center>
  </div>
	      
			
			
        

          </div><!-- /.row -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	
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
    </script>
    <script type="text/javascript">
      
      var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2500); // Change image every 2 seconds
}
    </script>
  </body>
</html>
