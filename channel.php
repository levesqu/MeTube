<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
	$channelid=$_GET['id'];
  $channelquery = "select channeltitle, channeldescription from channels where channelid='$channelid';";
  $channel_result = mysql_query($channelquery);
  $channel_result_row=mysql_fetch_row($channel_result);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title><?php echo $channel_result_row[0];?></title>
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
<?php if (isset($_SESSION['username'])) { 
    $logged_in=true; ?>
<h2><?php echo $_SESSION['username'];?> Welcome To MeTube!</h2>

<?php require 'browse_media.php'; } 
else { $logged_in=false; } ?>

<div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;">
<?php
  echo $channel_result_row[0];
?>
</div>
<br>
<p style="text-align: center;"><?php echo $channel_result_row[1]; ?></p>
<br>
<?php
	$query = "select * from channelmedia join channels where channels.channelid = channelmedia.channelid and channels.channelid=$channelid;";

	$result = mysql_query( $query );
	if (!$result) {
		die ("Could not query the channels table in the database: <br />". mysql_error());
	}
?>
	<table class="table table-hover">
<?php
	while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path, mediaTitle, mediaDescription, mediaTags, mediaCategory
	{ 
	    $mediaid=$result_row[2];
	    $media_query="select * from media where mediaid=$mediaid;";
        $media_result = mysql_query($media_query);
        $media_result_row = mysql_fetch_row($media_result);
		$filename = $media_result_row[0];
		$filepath = $media_result_row[4];
		$title = $media_result_row[5];
?>

		<tr class="success">
			<td>
				<a href="media.php?id=<?php echo $mediaid;?>" target="_blank"><?php echo $title;?></a>
			</td>
			<td>
				<a href="<?php echo $filepath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
			</td>
			<td>
			<?php if ($logged_in) { ?>
				<form class="form-horizontal" method="post" action="delete_channel_media_process.php" enctype="multipart/form-data">
					<input type="submit" class="btn btn-danger btn-xs" value="Remove Media" name="delete" />
					<input type="hidden" name="channelid" value="<?php echo $channelid?>">
					<input type="hidden" name="mediaid" value="<?php echo $mediaid?>">
				</form>
				<?php } ?>
			</td>
		</tr>
<?php
	}
?>
	</table>
	<?php if ($logged_in) { ?>
	<form action="add_media_to_channel.php" method="post">
		<button class="btn btn-primary pull-right" name="addChannel">Add Media To Channel</button>
		<input type="hidden" name="channelid" value="<?php echo $channelid; ?>"/>
	</form>
	<?php } ?>
</body>
</html>
