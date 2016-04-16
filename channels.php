<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Channels - MeTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Browse Channels</title>
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
    <?php require 'navigation.php'; ?>
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
	My Playlists
</div>
<br>
<?php
	$username=$_SESSION['username'];
	$query = "select * from channels where username='$username';";

	$result = mysql_query( $query );
	if (!$result) {
		die ("Could not query the playlists table in the database: <br />". mysql_error());
	}
?>
	<table id="mytable" class="table table-hover">
<?php
	while ($result_row = mysql_fetch_row($result))
	{ 
		$channeltitle = $result_row[1];
		$channelid=$result_row[0];
?>

		<tr class="success">
			<td>
				<a href="channel.php?id=<?php echo $channelid;?>" target="_blank"><?php echo $channeltitle;?></a> 
			</td>
			<td>
				<form class="form-horizontal" method="post" action="delete_channel_process.php" enctype="multipart/form-data">
					<input style="display: block; margin: auto;" type="submit" class="btn btn-danger btn-xs" value="Delete Channel" name="delete" />
					<input type="hidden" name="channelid" value="<?php echo $channelid?>">
				</form>
			</td>
		</tr>
<?php
	}
?>
		<tr>
			<td />
			<td>
				<form action="add_channel.php" method="post">
				<button class="btn btn-primary pull-right" name="addChannel">Add Channel</button>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
