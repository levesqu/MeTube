<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Channels - MeTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Browse Channels</title>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <script type="text/javascript" src="js/jquery-latest.pack.js"></script>
    <script type="text/javascript">
        function saveDownload(id)
        {
            $.post("media_download_process.php",
                {
                    id: id
                },
                function(message)
                { }
            );
        }
    </script>
    <!--the nav bar starts here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->

</head>

<body>

<p><?php echo $_SESSION['username'];?> Welcome To MeTube!</p>


<h3 class="addmargin">Click one of the options below to browse media.</h3><br>

<div class="btn-group btn-group-justified">
    <a href="./categories.php" class="btn btn-default">Categories</a>
    <a href="./favorites.php" class="btn btn-default">Favorites</a>
    <a href="./channels.php" class="btn btn-default">Channels</a>
    <a href="./playlists.php" class="btn btn-default">Playlists</a>
    <a href="./browse.php" class="btn btn-default">My Media</a>
</div><br>

<br><br>
<!--<button type="submit" class="btn btn-default">Add Channel</button> -->
<p> Chris can you move this to the right and make it dark blue like create playlist...</p>
<a href='./add_channel.php' style="background-color:#95a5a6; color:#FFFFFF; padding-left:50px; padding-right: 50px; padding-bottom: 10px; padding-top: 10px;"> &nbsp; Add Channel</a>
<p></p>
<p> Here will have a list of channels.</p>

</body>
</html>
