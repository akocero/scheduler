<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" style="padding-left:20px">
			  
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="">
                    <!-- Menu Toggle Button -->
                   <a href="faculty_home.php" style="color:#fff;" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-star-empty text-red"></i>
                      Class Schedule        
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                   <a href="faculty_exam1.php" style="color:#fff;" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-th text-red"></i>
                      Exam Schedule        
                    </a>
                  </li>
                 
				  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="profile.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-user text-orange"></i>
                      <?php echo $_SESSION['name'];?>
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> 
                      
                    </a>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>