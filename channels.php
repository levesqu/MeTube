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

<?php
  if (isset($_SESSION['username'])) {
    $logged_in=true;
    if (isset($_POST['username']))
    {
      $username=$_POST['username'];
      $user_me=$_SESSION['username'];
      $my_page=false;
    } else {
      $username=$_SESSION['username'];
      $my_page=true;
    }
  } else {
    $logged_in=false;
    $username=$_POST['username'];
    $my_page=false;
  }
?>

<body>
<?php if ($logged_in) { ?>
<h2><?php echo $_SESSION['username'];?> Welcome To MeTube!</h2>

<?php require 'browse_media.php'; } 
  if ($my_page) {
?>

<div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;">
	My Channels
</div>
<?php } else { ?>
<div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;"><?php echo $username; ?>'s Channels</div>
<?php } ?>
<br>
<?php
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

<script type="text/javascript">
    function submitUsernameForChannelForm(number)  {
        document.getElementById("goToChannel"+number).submit();
    }
</script>

		<tr class="success">
			<td>
				<form method="post" action="channel.php?id=<?php echo $channelid; ?>" id="goToChannel<?php echo $channelid; ?>">
					<input type="hidden" name="username" value="<?php echo $username; ?>">
				</form>
				<a style="cursor:pointer; cursor:hand;" onclick="submitUsernameForChannelForm(<?php echo $channelid; ?>)"> <?php echo $channeltitle;?></a> 
			</td>
			<td>
				<?php if ($my_page) { ?>
				<form class="form-horizontal" method="post" action="delete_channel_process.php" enctype="multipart/form-data">
					<input style="display: block; margin: auto;" type="submit" class="btn btn-danger btn-xs" value="Delete Channel" name="delete" />
					<input type="hidden" name="channelid" value="<?php echo $channelid?>">
				</form>
				<?php } ?>
			</td>
		</tr>
<?php
	}
	if ($my_page) {
?>
		<tr>
			<td />
			<td>
				<form action="add_channel.php" method="post">
				<button class="btn btn-primary pull-right" name="addChannel">Add Channel</button>
				</form>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
