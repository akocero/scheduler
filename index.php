<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login - <?php include('dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="dist/img/iconlogo.ico">
    <!-- Font Awesome -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <style type="text/css">
    a.adminbutton{
       background-color: #3498DB ;
      color: white;
      padding: 8px 45px;
      text-align: center;
      text-decoration: none;
      display: inline-block;


    }
    a.adminbutton:hover, a:active {
  background-color: #2E86C1;

}

body, html {
  height: 100%;
  margin: 0;

}
  * {
  box-sizing: border-box;
}
.bg-image {
  /* The image used */
    background-image: url('dist/img/cdsga3.jfif');
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 50%;
  padding: 50px;
  text-align: center;
}
  </style>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body>
       
   <div class="bg-image"></div>
   <div class="bg-text">
    <h2>
      <b style="color: #641E16; font-size: 40px;">C</b>olegio <b style="color: #641E16; font-size: 40px;">D</b>e 
      <b style="color: #641E16; font-size: 40px;">S</b>an <b style="color: #641E16; font-size: 40px;">G</b>abriel 
      <b style="color: #641E16; font-size: 40px;">A</b>rcangel
    </h2>
    <hr>
    <div class="login-box">
      <div class="login-logo">
        <h2>SCHEDULING SYSTEM</h2>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">A D M I N</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
			<div class="col-xs-6 pull-right">
			  <button type="reset" style="background-color:#7B241C; color: white;"class="btn btn-block btn-flat">Clear</button>
            </div><!-- /.col -->
			<div class="col-xs-6 pull-right">
              <button type="submit" style="background-color:#7B241C; color: white;"  class="btn btn-block btn-flat" name="login" default>Sign In</button>
            </div><!-- /.col -->
          </div>
          <hr>
          
          <!--button for student page -->
          <!-- <div><abbr title="Click to Student log-in"><a href="../scheduling_student/index2.php" class="adminbutton" >Student</a></abbr></div> -->
          </div>

        </form>

        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
      </div> <!-- bg-text -->
           
   
<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

  </body>
</html>
