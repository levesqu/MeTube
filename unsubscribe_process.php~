<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$channelid=$_POST['channelid'];
$mediaid=$_POST['mediaid'];

//insert into comments table
$query = "delete from subs where username='$username' and channelid=$channelid";
$queryresult = mysql_query($query)
	or die("Remove from Subs error in unsubscribe_process.php " .mysql_error());


if (isset($_POST['unsubscribeFromList'])) 
{ ?>
<meta http-equiv="refresh" content="0;url=subscriptions.php">
<?php
} 
else
{ ?>
<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $mediaid;?>">
<?php
}
?>
