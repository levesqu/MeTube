<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <title>Messages</title>
    <script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

    <!--the nav bar starts here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->

</head>

<body>


<?php
$username = $_SESSION['username'];
$usersquery="select * from messages where messagereceiver='$username' group by messagesender;";
$userresults=mysql_query($usersquery)
	or die("Could not query the messages table <br>" . mysql_error());
?>
<br><br>

<div class="addmargin">
<fieldset class="form-horizontal">
<legend>Messages</legend>
<table class="table table-striped">
    <?php
    while ($single_user = mysql_fetch_row($userresults))
    {
    	$other_user=$single_user[3];
		$messagequery="select * from (select * from messages where (messagereceiver='$username'" . 
		"and messagesender='$other_user') or (messagereceiver='$other_user' and messagesender='$username'))".
		"t order by messageid desc;";
		$messages = mysql_query($messagequery);
		if (!$messages)
		{
			 die("Could not query the messages table in the database: <br />".mysql_error());
		}

		$singleMessage = mysql_fetch_row($messages);
        $messageSubject = $singleMessage[1];
        ?>
        <tr>
            <td><?php echo $other_user?>: &#09;

                <form method="post" action="messageThread.php">
                    <input type="submit" class="btn btn-link " value="<?php echo $messageSubject ?>" name="readMessageSubject" />
                    <input type="hidden" name="sendMessageTo" value="<?php echo $other_user?>"/>
                </form>
        </tr>
        <?php
    }
    ?>

</table>
</fieldset>



<!--    text field and a button-->
<form class="form-horizontal" method="post" action="messageThread.php">
    <table class="table table-striped">
        <tr>
            <td  width="20%"><label for="sendMessageTo" class="col-lg-2 control-label">Send Message To:</label></td>
            <td width="80%"><input  class="form-control col-lg-4"" title="sendMessageTo" type="text" name="sendMessageTo" placeholder="Username"><br /></td>
            <td><input type="submit" class="btn btn-primary btn-sm" value="Send Message" name="readMessageSubject" /></td>
        </tr>
    </table>
</form>


</div>
</body>
</html>
