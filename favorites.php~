<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Favorites - MeTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path, mediaTitle, mediaDescription, mediaTags, mediaCategory
	{ 
		$mediaid = $result_row[3];
		$filename = $result_row[0];
		$filepath = $result_row[4];
		$title = $result_row[5];
?>

		<tr class="success">
			<td />
			<td>
				<a href="media.php?id=<?php echo $mediaid;?>" target="_blank">&nbsp;<?php echo $title;?></a>
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
