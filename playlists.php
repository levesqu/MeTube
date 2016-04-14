<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Playlists - MeTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Playlists</title>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <script type="text/javascript" src="js/jquery-latest.pack.js"></script>
    <script type="text/javascript">
        function saveDownload(id)
        {
            $.post("media_download_process.php",
                {
                    id: id
                },
                function(message)
                { }
            );
        }
    </script>
    <!--the nav bar starts here -->
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
                    <li class="active"><a href="./index.php">Home page <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Maybe fill with something?</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./inbox.php">Messages</a></li>
                    <li><a href="./profile_update.php">Update Profile</a></li>
                    <li><a href="./logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar ends here -->
</head>

<body>


<h2><?php echo $_SESSION['username'];?> Welcome To MeTube!</h2>


<h4 class="addmargin">Click one of the options below to browse media.</h4><br>

<div class="btn-group btn-group-justified">
    <a href="./categories.php" class="btn btn-default">Categories</a>
    <a href="./favorites.php" class="btn btn-default">Favorites</a>
    <a href="./channels.php" class="btn btn-default">Channels</a>
    <a href="./playlists.php" class="btn btn-default">Playlists</a>
    <a href="./browse.php" class="btn btn-default">My Media</a>
</div><br>


<br>
<div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;">
	My Favorites
</div>
<br>
<?php
	$username=$_SESSION['username'];
	$query = "select * from media join favorites on media.mediaid=favorites.mediaid where favorites.username='$username';";

	$result = mysql_query( $query );
	if (!$result) {
		die ("Could not query the media table in the database: <br />". mysql_error());
	}
?>
	<table class="table table-hover">
<?php
	while ($result_row = mysql_fetch_row($result))
	{ 
		$playlisttitle = $result_row[1];
?>

		<tr class="success">
			<td />
			<td>
				<a href="media.php?id=<?php echo $mediaid;?>" target="_blank">&nbsp;<?php echo $playlisttitle;?></a> 
			</td>
			<td>
				<a href="<?php echo $filepath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
			</td>
			<td>
					<form class="form-horizontal" method="post" action="unfavorite_process.php" enctype="multipart/form-data">
						<input type="submit" class="btn btn-danger btn-xs" value="Remove Favorite" name="unfavoriteMediaFromList" />
						<input type="hidden" name="mediaid" value="<?php echo $mediaid?>">
					</form>
			</td>
		</tr>
<?php
	}
?>
	</table>

</body>
</html>
