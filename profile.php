<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Message - MeTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>New Message</title>
    <link rel="stylesheet" type="text/css" href="css/default.css" />

    <!-- the nav bar ends here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->
</head>

<body>


<?php
    $username = $_POST['username'];

    $queryProfile = "select * from account where username ='$username'";
    $profile = mysql_query($queryProfile);

    $profileInfo=mysql_fetch_row($profile);

    $age = $profileInfo[2];
    $workplace = $profileInfo[3];
    $aboutme = $profileInfo[4];
    $firstname = $profileInfo[5];
    $lastname = $profileInfo[6];

?>


<script type="text/javascript">
    function submitMessageForm()  {
        document.getElementById("sendMessage").submit();
    }
</script>

<form method="POST" action="messageThread.php" id="sendMessage">
    <input type="hidden" name="sendMessageTo" value="<?php echo $username;?>"/>
</form>

<script type="text/javascript">
    function submitUsernameForProfileForm()  {
        document.getElementById("goToChannels").submit();
    }
</script>

<form method="POST" action="channels.php" id="goToChannels">
    <input type="hidden" name="username" value="<?php echo $username;?>"/>
</form>



<div class="addmargin">
<?php
if(isset($_SESSION['username'])) {

    if ($_SESSION['username'] == $username) {
        //    show my profile buttons
        ?>
        <div class="btn-group btn-group-justified">
            <a href="./channels.php" class="btn btn-default">My Channels</a>
            <a href="./my_media.php" class="btn btn-default">My Media</a>
            <a href="./profile_update.php" class="btn btn-default">Update Profile</a>
        </div><br><br>

        <?php
    } else {
        // show generic buttons
        ?>
        <a style="cursor:pointer; cursor:hand;"onclick="submitUsernameForProfileForm()"class="btn btn-default"> Channels</a>

        <?php
    }
    ?>

    <h2><?php echo $username ?></h2>

    <h3><?php echo $firstname; 
    		echo " ";
    		echo $lastname; ?></h3>
    <h4>About:</h4>
    <p> <?php echo $aboutme ?>  </p>
    <?php
    if ($_SESSION['username'] != $username and isset($_SESSION['username'])) {
        ?>
        <a style="cursor:pointer; cursor:hand;" onclick="submitMessageForm()" class="btn btn-default">Send Message</a>
        <?php
    }

}
else {

?>
    <!-- if not logged in -->
    <a style="cursor:pointer; cursor:hand;"onclick="submitUsernameForProfileForm()"class="btn btn-default"> Channels</a>

    <h2><?php echo $username ?></h2>

    <h3><?php echo $firstname;?>
        &nbsp;
        <?php  echo $lastname; ?></h3>
    <h4>About:</h4>
    <p> <?php echo $aboutme ?>  </p>

<?php

}

$query = "SELECT * from media WHERE username='$username'";

$result = mysql_query( $query );
if (!$result){
    die ("Could not query the media table in the database: <br />". mysql_error());
}
?>
    <br><br>
    <div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;"><?php echo $username;?>'s  Media</div>
    <table class="table table-hover">
        <?php
        while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path
        {
            $mediaid = $result_row[3];
            $filename = $result_row[0];
            $filepath = $result_row[4];
            $title = $result_row[5];
            ?>

            <tr class="success">
                <td />
                <td>
                    <a href="media.php?id=<?php echo $mediaid;?>" target="_blank"><?php echo $title;?></a>
                </td>
                <td>
                    <a href="<?php echo $filepath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <br>
    </table>
</div>

</body>
</html>
