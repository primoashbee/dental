    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DENTAL.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">MY RECORDS</a></li>
            <li ><a href="reservation.php">MAKE APPOINTMENT</a></li>
           
            <li ><a href="accounts.php">MY INFORMATION</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'];
              ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li id="toChangePass"  email="<?php 
                echo $_SESSION['username'];
                 ?>" 
                 value ="<?php echo $_SESSION['username']; ?>"><a href="#">Change Password</a></li>
                <li id="toLogout"><a href="#">Log Out</a></li>

              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>