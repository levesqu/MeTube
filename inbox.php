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
$username = $_SESSION['username'];;
$messagequery="select * from (select * from messages where messagereceiver='$username' order by messageid DESC)t group by messagesender";
$messages = mysql_query($messagequery);
if (!$messages)
{
    die("Could not query the messages table in the database: <br />".mysql_error());
}
?>
<br><br>

<div class="addmargin">
<fieldset class="form-horizontal">
<legend>Messages</legend>
<table class="table table-striped">
    <?php
    while ($singleMessage = mysql_fetch_row($messages))
    {
        $messageSender = $singleMessage[3];
        $messageSubject = $singleMessage[1];
        ?>
        <tr>
            <td><?php echo $messageSender?>: &#09;

                <form method="post" action="messageThread.php">
                <input type="submit" class="btn btn-link " value="<?php echo $messageSubject ?>" name="readMessageSubject" />
                    <input type="hidden" name="sendMessageTo" value="<?php echo $messageSender?>"/>
                </form>
        </tr>
        <?php
    }
    ?>

</table>
</fieldset>



<!--    text field and a button-->
    <a href="" class="btn btn-primary" >New Message</a>


</div>
</body>
</html>
