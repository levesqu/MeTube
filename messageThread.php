<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <title>Media</title>
    <script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

    <!--the nav bar starts here -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./browse.php">METUBE</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="./browse.php">Home page <span class="sr-only">(current)</span></a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./inbox.php">Messages</a></li>
                    <li><a href="./profile_update.php">Update Profile</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar ends here -->

</head>


<body>
<div class="addmargin">

<!-- message thread starts here -->

<?php
$sendmessageto=$_POST['sendMessageTo'];

?>
<!--    --><?php
//    echo "<h4>Message to: &nbsp;</h4> ";
//    echo "<p>$sendUser</p>";
//    // Comments start-->
//    $commentquery="select * from comments where mediaid='$mediaId'";
//    $comments = mysql_query($commentquery);
//    if (!$comments)
//    {
//        die("Could not query the comment table in the database: <br />".mysql_error());
//    }
//    ?>
<!--    <br><br>-->
<!--    <fieldset="form-horizontal">-->
<!--    <table class="table table-striped">-->
<!--        --><?php
//        while ($singleComment = mysql_fetch_row($comments))
//        {
//            $commentUser = $singleComment[2];
//            $commentBody = $singleComment[3];
//            ?>
<!--            <tr>-->
<!--                <td><label class="control-label">--><?php //echo $fromUser;?><!--:</label>-->
<!--                    <br><p>--><?php //echo $commentContent?><!--</p>-->
<!--                </td>-->
<!--            </tr>-->
<!--            --><?php
//        }
//        ?>  <!-- message thread end here -->


<fieldset class ="form-horizontal">
    <table class="table table-striped">
        <tr>
            <td>
                <form class="form-horizontal" method="post" action="sendMessage_process.php">
                    <label class="control-label">Send message to <?php echo $sendmessageto?>:</label>
                    <br>
                    <label for="messageSubject" class="control-label">Subject: &nbsp;</label>
                    <input type="text" class="form-control" name="messageSubject" />
                    <br>
                    <textarea class="form-control" rows="3" name="userComment"></textarea>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Send Message"/>
                    <!--<input type="hidden" name="mediaid" value="<?php?>"/>-->
                </form>
            </td>
        </tr>
    </table>
</fieldset>












</div>
</body>