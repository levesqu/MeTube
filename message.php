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

<div class="addmargin">

<h4 class="addmargin">New Message</h4><br>


<?php

$username = $_SESSION['username'];
if (isset($_POST['categoryType']))
{
$category = $_POST['categoryType'];

$query = "SELECT * from media WHERE mediaCategory='$category'";

$result = mysql_query( $query );
if (!$result){
    die ("Could not query the media table in the database: <br />". mysql_error());
}
?>
<table class="table table-hover">
    <?php
    while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path, mediaTitle, mediaDescription, mediaTags, mediaCategory
    {
        $mediaid = $result_row[3];
        $filename = $result_row[0];
        $filepath = $result_row[4];
        ?>

        <tr class="success">
            <td>

                <?php
                //echo $mediaid;  //mediaid
                ?>
            </td>
            <td>
                <a href="media.php?id=<?php echo $mediaid;?>" target="_blank">&nbsp;<?php echo $filename;?></a>
            </td>
            <td>
                <a href="<?php echo $filepath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
            </td>
        </tr>
        <?php
    }
    }
    ?>
    <br>
</table>
    </div>

</body>
</html>
