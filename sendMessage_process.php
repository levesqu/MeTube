<?php
session_start();
include_once "function.php";

/******************************************************
 *
 * Send Message
 *
 *******************************************************/

$username=$_SESSION['username'];
$sendTo=$_POST['sendMessageTo'];
$messagecontent=$_POST['messageContent'];
$messageSubject=$_POST['messageSubject'];
$messageSend=$_POST['messageSender'];


//insert into comments table
$insert = "insert into messages(messageid, messagesubject, messagecontent, messagesender,messagereceiver, is_read)".
    "values(NULL,'$messageSubject','$messagecontent','$messageSend','$sendTo', FAlSE)";
$queryresult = mysql_query($insert)
or die("Insert into Messages error in sendMessage_process.php " .mysql_error());

?>

<meta http-equiv="refresh" content="0;url=messageThread.php">

<form class="form-horizontal" method="post" action="sendMessage_process.php">
    <input type="hidden" name="sendMessageTo" value="<?php echo $sendTo?>"/>
</form>