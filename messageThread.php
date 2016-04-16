<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <title>Message Thread</title>
    <script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

    <!--the nav bar starts here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->

</head>


<body>
<div class="addmargin">

<!-- message thread starts here -->

<?php
$sendMessageTo=$_POST['sendMessageTo'];
$messagesender=$_SESSION['username'];



    echo "<h4>Messages with: &nbsp; $sendMessageTo </h4> ";
  //  echo "<p>$sendMessageTo</p>";

    // Comments start-->
    $messagequery="select * from messages where (messagereceiver='$messagesender' and messagesender='$sendMessageTo') or (messagereceiver='$sendMessageTo' and messagesender='$messagesender');";


    $messages = mysql_query($messagequery);
    if (!$messages)
    {
        die("Could not query the comment table in the database: <br />".mysql_error());
    }
    ?>
    <br><br>
    <fieldset class="form-horizontal">
        <table class="table table-striped">
            <?php
            while ($singleMessage = mysql_fetch_row($messages))
            {
                $messagebody = $singleMessage[2]; // body of message
                $sender = $singleMessage[3]; // person that sent this message
                $messagesubject = $singleMessage[1];
                ?>
                <tr>
                    <td><label class="control-label"><?php echo $sender;?>:</label>&nbsp;
                        <label class="control-label"><?php echo $messagesubject;?></label>
                        <br><p><?php echo $messagebody?></p>
                    </td>
                </tr>
                <?php
            }
            ?>  <!-- message thread end here -->


<fieldset class ="form-horizontal">
    <table class="table table-striped">
        <tr>
            <td>
                <form class="form-horizontal" method="post" action="sendMessage_process.php">
                    <label class="control-label">Send message to <?php echo $sendMessageTo?>:</label>
                    <br>
                    <label for="messageSubject" class="control-label">Subject: &nbsp;</label>
                    <input type="text" class="form-control" name="messageSubject" />
                    <br>
                    <label for="messageContent" class="control-label">Message:</label>
                    <textarea class="form-control" rows="3" name="messageContent"></textarea>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Send Message"/>
                    <input type="hidden" name="messageSender" value="<?php echo $messagesender?>"/>
                    <input type="hidden" name="sendMessageTo" value="<?php echo $sendMessageTo?>"/>
                </form>
            </td>
        </tr>
    </table>
</fieldset>












</div>
</body>
