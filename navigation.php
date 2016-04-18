<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once "function.php";
	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$message_query = "select * from messages where messagereceiver='$username' and is_read=0;";
		$message_results = mysql_query($message_query);
		$message_count = mysql_num_rows($message_results);
		$logged_in = 1;
	}

if (isset($logged_in)) { ?>
<!--    form for profile page link-->
    <form method="POST" action="profile.php" id="profile">
    <input type="hidden" name="username" value="<?php echo $username;?>"/>
    </form>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="browse.php">METUBE</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class=""><a href="browse.php">Media<span class="sr-only">(current)</span></a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class=""><a href="users.php">Users<span class="sr-only">(current)</span></a></li>
			</ul>
			<form class="navbar-form navbar-left" method="post" role="search" action="searchMedia.php">
				<div class="form-group">
					<input type="text" name="searchWords" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default" >Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="inbox.php">Messages 
				<?php if ($message_count!=0) { ?>
					<span class="badge"><?php echo $message_count; ?></span>
				<?php } ?>
				<li style="cursor:pointer; cursor:hand;"><a onclick="submitForm()">Profile</a> </li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

    <script type="text/javascript">
        function submitForm()  {
            document.getElementById("profile").submit();
        }
    </script>

<?php } else { ?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="browse.php">METUBE</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class=""><a href="browse.php">Media<span class="sr-only">(current)</span></a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class=""><a href="users.php">Users<span class="sr-only">(current)</span></a></li>
			</ul>
			<form class="navbar-form navbar-left" method="post" role="search" action="searchMedia.php">
				<div class="form-group">
					<input type="text" name="searchWords" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default" >Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile_update.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	</div>
</nav>
<?php } ?>
