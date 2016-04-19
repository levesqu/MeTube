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
$sendMessageTo=ucfirst($_POST['sendMessageTo']);
$messagesender=$_SESSION['username'];

if($messagesender == $sendMessageTo){
    echo "<div class='text-danger'>Error: can not send message to yourself<br> PLease go back and try again</div>";

}
else{
    if (isset($_POST['recursive']))
    {
        $sendTo=$_POST['sendMessageTo'];
        $messagecontent=mysql_real_escape_string($_POST['messageContent']);
        $messageSubject=mysql_real_escape_string($_POST['messageSubject']);
        $messageSend=$_POST['messageSender'];


        //insert into comments table
        $insert = "insert into messages(messageid, messagesubject, messagecontent, messagesender,messagereceiver, is_read)".
             "values(NULL,'$messageSubject','$messagecontent','$messageSend','$sendTo', FAlSE)";
        $queryresult = mysql_query($insert)
            or die("Insert into Messages error in sendMessage_process.php " .mysql_error());
    }


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
                    $isread = $singleMessage[5];
                    $messageid = $singleMessage[0];
                    ?>
                    <tr <?php if ($isread==0 and $sender==$sendMessageTo) {?> class="info" id="colorchanger<?php echo $messageid;?>"<?php } ?>>
                        <td><label class="control-label"><?php echo $sender;?>:</label>&nbsp;
                            <label class="control-label"><?php echo $messagesubject;?></label>
                            <br><p><?php echo $messagebody?></p>
                        </td>
                    </tr>
                        <?php
                        if ($isread==0 and $sender==$sendMessageTo) { ?>
                        <script type="text/javascript">
                            setTimeout(function() {
                                document.getElementById("colorchanger"+'<?php echo $messageid; ?>').className="";
                            }, 5000);
                        </script>
                        <?php
                        }
                }
                ?>  <!-- message thread end here -->


    <fieldset class ="form-horizontal">
        <table class="table table-striped">
            <tr>
                <td>
                    <form class="form-horizontal" method="post" action="">
                        <label class="control-label">Send message to <?php echo $sendMessageTo?>:</label>
                        <br>
                        <label for="messageSubject" class="control-label">Subject: &nbsp;</label>
                        <input type="text" class="form-control" name="messageSubject" />
                        <br>
                        <label for="messageContent" class="control-label">Message:</label>
                        <textarea class="form-control" rows="3" name="messageContent"></textarea>
                        <br>
                        <input type="submit" name="recursive"class="btn btn-primary" value="Send Message"/>
                        <input type="hidden" name="sendMessageTo" value="<?php echo $sendMessageTo;?>"/>
                        <input type="hidden" name="messageSender" value="<?php echo $messagesender;?>"/>
                    </form>
                </td>
            </tr>
        </table>
    </fieldset>
    </div>
<?php
}

    $readmessages = "update messages set is_read=1 where messagereceiver='$messagesender' and messagesender='$sendMessageTo';";
    $readresult = mysql_query($readmessages)
    	or die("Could not query the messages table: <br> " . mysql_error());
?>
</body>
