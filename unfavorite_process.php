<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$mediaid=$_POST['mediaid'];

//insert into comments table
$query = "delete from favorites where username='$username' and mediaid=$mediaid";
$queryresult = mysql_query($query)
	or die("Remove from Favorites error in unfavorite_process.php " .mysql_error());


if (isset($_POST['unfavoriteMediaFromList'])) 
{ ?>
<meta http-equiv="refresh" content="0;url=favorites.php">
<?php
} 
else
{ ?>
<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $mediaid;?>">
<?php
}
?>
