<?php
session_start();
include_once "function.php";

$username=$_SESSION['username'];
$commentId=$_POST['commentId'];
$mediaId=$_POST['mediaId'];

//insert into comments table
$query = "delete from comments where username='$username' and commentid=$commentId and mediaid=$mediaId";
echo $query;
$queryresult = mysql_query($query)
	or die("Remove from Comments error in delete_comment_process.php " .mysql_error());
?>

<meta http-equiv="refresh" content="0;url=media.php?id=<?php echo $mediaId; ?>">
