<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];

if (isset($_POST['createPlaylist']) or isset($_POST['createAndAddToPlaylist']))
{
	if (isset($_POST['createAndAddToPlaylist']))
	{
		$title=$_POST['playlistTitleNew'];
	}
	else
	{
		$title=$_POST['playlistTitle'];
	}
	$query = "insert into playlists(playlistid,playlisttitle,username) values(NULL,'$title','$username');";
	$queryresult = mysql_query($query)
		or die("Insert into Playlists error in add_to_playlist_process.php " .mysql_error());
}

if (isset($_POST['addToPlaylist']) or isset($_POST['createAndAddToPlaylist']))
{
if (isset($_POST['createAndAddToPlaylist']))
	{
		$playlistTitle=$_POST['playlistTitleNew'];
	}
	else
	{
		$playlistTitle=$_POST['playlistTitle'];
	}
	$query = "select playlistid from playlists where playlisttitle='$playlistTitle'";
	echo $playlistTitle;
	$result = mysql_query($query)
		or die("Select from Playlists error in add_to_playlist_process.php " .mysql_error());
	$result_row = mysql_fetch_row($result);
	$playlistId = $result_row[0];
	$mediaId = $_POST['mediaid'];
	$insertquery = "insert into playlistmedia(mapid,playlistid,mediaid) values(NULL,$playlistId,$mediaId);";
	$insert = mysql_query($insertquery)
		or die("Insert into PlaylistMedia error in add_to_playlist_process.php " .mysql_error());
}

if (isset($_POST['createPlaylist'])) 
{ ?>
<meta http-equiv="refresh" content="0;url=playlists.php">
<?php
} 
else
{ ?>
<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $_POST['mediaid'];?>">
<?php
}
?>
