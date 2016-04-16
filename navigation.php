<?php
	$username = $_SESSION['username'];
	$message_query = "select * from messages where messagereceiver='$username' and is_read=0;";
	$message_results = mysql_query($message_query);
	$message_count = mysql_num_rows($message_results);
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./browse.php">METUBE</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="./browse.php">Home page <span class="sr-only">(current)</span></a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="./inbox.php">Messages <span class="badge"><?php echo $message_count; ?></span></a></li>
				<li><a href="./profile_update.php">Update Profile</a></li>
				<li><a href="./logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
