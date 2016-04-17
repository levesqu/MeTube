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
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->
</head>

<body>

<h2><?php echo $_SESSION['username'];?> Welcome To MeTube!</h2>

<?php require 'browse_media.php'; ?>

<div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;">
	My Playlists
</div>
<br>
<?php
	$username=$_SESSION['username'];
	$query = "select * from playlists where username='$username';";

	$result = mysql_query( $query );
	if (!$result) {
		die ("Could not query the playlists table in the database: <br />". mysql_error());
	}
?>
	<table id="mytable" class="table table-hover">
<?php
	while ($result_row = mysql_fetch_row($result))
	{ 
		$playlisttitle = $result_row[1];
		$playlistid=$result_row[0];
?>

		<tr class="success">
			<td>
				<a href="playlist.php?id=<?php echo $playlistid;?>" target="_blank"><?php echo $playlisttitle;?></a> 
			</td>
			<td>
				<form class="form-horizontal" method="post" action="delete_playlist_process.php" enctype="multipart/form-data">
					<input type="submit" class="btn btn-danger btn-xs" value="Delete Playlist" name="delete" />
					<input type="hidden" name="playlistid" value="<?php echo $playlistid?>">
				</form>
			</td>
		</tr>
<?php
	}
?>
		<tr>
			<form class="form-horizontal" method="post" action="add_to_playlist_process.php" enctype="multipart/form-data">
				<td>
					<label for="playlistTitle" class="col-lg-2 control-label">Create New Playlist:</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="playlistTitle" />
					</div>
				</td>
				<td>
					<input type="submit" class="btn btn-primary" value="Create Playlist" name="createPlaylist" />
				</td>
			</form>
		</tr>
	</table>
</body>
</html>
