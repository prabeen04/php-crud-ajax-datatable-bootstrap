	<!-- Static navbar -->
	<nav class="navbar navbar-default navigation">
		<!-- <div class="container-fluid"> -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				 aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
				<a class="navbar-brand" href="index.php" style="padding: 0; margin: 0 10px 0 0;">
					<img src="images/logo.jpg" alt="" class="img img-responsive" style="height: 50px; width: 120px;">
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php  
				if(isset($_SESSION["username"]))  
				{  
				?>
				<li><a href="#"><?php echo $_SESSION['username'] ;?></a></li>
				<?php 
					if($_SESSION['admin'] == 1){ ?>
				<li><a href="admin.php">Admin Panel</a></li>
				<?php	}
				?>
				<?php 
					if($_SESSION['admin'] == 0){?>
				<li><a href="user.php">User Panel</a></li>
				<?php	}
				?>
				<?php }?>

			   
			   <?php  
				if(!isset($_SESSION["username"]))  
				{  
				?>
				<li><a href="login.php">Login</a></li>
				<?php }?>
				<?php  
				if(isset($_SESSION["username"]))  
				{  
				?>
				<li><a href="logout.php">Logout</a></li>
				<?php }?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		<!-- </div> -->
		<!--/.container-fluid -->
	</nav>