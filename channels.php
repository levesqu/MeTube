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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">METUBE</a>
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
<p> Here will have a list of channels.</p>

</body>
</html>
