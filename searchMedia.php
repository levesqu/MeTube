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
$searchWords = $_POST['searchWords'];

$query = "SELECT * from media WHERE mediaTags='$searchWords'";

$result = mysql_query( $query );
if (!$result){
    die ("Could not query the media table in the database: <br />". mysql_error());
}
?>
<div class="addmargin">

    <!-- table filled by what we've serarched for -->
        <table class="table table-hover">
            <?php

            if(mysql_num_rows($result)==0){
                ?>
                <tr class="primary">
                    <td> No search results to display</td>
                <tr>
                    <?php
            }
            else{
                while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path
                {
                    $mediaid = $result_row[3];
                    $filename = $result_row[0];
                    $filepath = $result_row[4];
                    ?>

                    <tr class="success">
                        <td>
                            <a href="media.php?id=<?php echo $mediaid;?>" target="_blank">&nbsp;<?php echo $filename;?></a>
                        </td>
                        <td>
                            <a href="<?php echo $filepath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
                        </td>
                    </tr>
                    <?php
                }

            }?>

            <br>
    </table>








</div>



</body>
</html>