<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Subscriptions - MeTube</title>
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

<?php require 'browse_media.php'; ?>

<div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;">
	My Subscriptions
</div>
<br>
<?php
	$username=$_SESSION['username'];
	$query = "select * from subs where username='$username';";

	$result = mysql_query( $query );
	if (!$result) {
		die ("Could not query the subs table in the database: <br />". mysql_error());
	}
?>
	<table id="mytable" class="table table-hover">
<?php
	while ($result_row = mysql_fetch_row($result))
	{ 
		$channelid=$result_row[1];
		$channelquery="select * from channels where channelid=$channelid";
		$channelresult=mysql_query($channelquery);
		$channelrow=mysql_fetch_row($channelresult);
		$channeltitle=$channelrow[1];
      $other_user=$channelrow[3];
?>

<script type="text/javascript">
  function submitUsernameFromSubscription(id) {
    document.getElementById("subscriberUsernameForm"+id).submit();
  }
</script>

<form action="channel.php?id=<?php echo $channelid; ?>" method="post" id="subscriberUsernameForm<?php echo $channelid; ?>">
  <input type="hidden" name="username" value="<?php echo $other_user; ?>" />
</form>

		<tr class="success">
			<td>
				<a style="cursor:pointer; cursor:hand;" onclick="submitUsernameFromSubscription(<?php echo $channelid; ?>)" target="_blank"><?php echo $channeltitle;?></a> 
			</td>
			<td>
				<form class="form-horizontal" method="post" action="unsubscribe_process.php" enctype="multipart/form-data">
					<input style="display: block; margin: auto;" type="submit" class="btn btn-danger btn-xs" value="Unsubscribe" name="unsubscribeFromList" />
					<input type="hidden" name="channelid" value="<?php echo $channelid?>">
				</form>
			</td>
		</tr>
<?php
	}
?>
	</table>
</body>
</html>
