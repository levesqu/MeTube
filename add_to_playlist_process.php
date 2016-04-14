<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];

if (isset($_POST['createPlaylist']))
{
	$title=$_POST['playlistTitle'];
	$query = "insert into playlists(playlistid,playlisttitle,username) values(NULL,'$title','$username')";
	$queryresult = mysql_query($query)
		or die("Insert into Playlists error in add_to_playlist_process.php " .mysql_error());
}
elseif (isset($_POST['createAndAddPlaylist']))
{

}
else
{

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
