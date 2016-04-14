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
                    <li><a href="./profile_update.php">Update Profile</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar ends here -->

</head>

<body>


<?php
$username = $_SESSION['username'];;
$messagequery="select * from messages where messagereceiver='$username'";
$messages = mysql_query($messagequery);
if (!$result)
{
    die("Could not query the comment table in the database: <br />".mysql_error());
}
?>
<br><br>
<fieldset="form-horizontal">
<legend>Messages</legend>
<table class="table table-striped">
    <?php
    while ($singleMessage = mysql_fetch_row($messages))
    {
        $messageSender = $singleMessage[3];
        $messageSubject = $singleMessage[1];
        ?>
        <tr>
            <td><?php echo $messageSender?>:<br><?php echo $messageSubject?>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td>
            <form class="form-horizontal" method="post" action="">
                <label class="col-lg-2 control-label"><?php echo $_SESSION['username']?>:</label>
                <input type="textarea" name="userComment" />
            </form>
        </td>
    </tr>
</table>
</fieldset>


</body>
</html>