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
                    <li><a href="#">Maybe fill with something?</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./profile_update.php">Update Profile</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar ends here -->

</head>

<body>



<?php
if(isset($_GET['id'])) {
	$query = "SELECT * FROM media WHERE mediaid='".$_GET['id']."'";
	$result = mysql_query( $query );
	$result_row = mysql_fetch_row($result);
	
	//updateMediaTime($_GET['id']);
	
	$filename=$result_row[0];   ////0, 4, 2
	$filepath=$result_row[4];
    $mediatitle=$result_row[5];
	$type=$result_row[2];
	if(substr($type,0,5)=="image") //view image
	{
		echo "Viewing Picture: ";
		echo $result_row[5];
        echo "<br><br>";
		echo "<img src='".$filepath."'/>";

	}
	elseif (substr($type,0,5)=="video")//view movie
	{	
?>
	<p>Viewing Video: <?php echo $result_row[5];?></p>

        <object id="MediaPlayer" width=560 height=286 classid="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" standby="Loading Windows Media Player components…" type="application/x-oleobject" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112">

            <param name="filename" value="<?php echo $filepath?>">
            <param name="Showcontrols" value="True">
            <param name="autoStart" value="True">
            <div style="text-align:center">


            <video width="400" controls>
                <source src="<?php echo $filepath; ?> " type="video/mp4">
                <source src="<?php echo $filepath; ?>" type="video/webm">
                <source src="<?php echo $filepath; ?> " type="video/ogg">
                Your browser does not support HTML5 video.
            </video>
                <br><br><br>
            </div>

            <script>
                var myVideo = document.getElementById("video1");

                myVideo.onseeking = function(){};

            </script>
        </object>
    <?php }
        elseif(substr($type,0,5)=="audio"){?>
        <p>Listening To Audio: <?php echo $result_row[5];?></p>

<object id="MediaPlayer" width=560 height=286 classid="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" standby="Loading Windows Media Player components…" type="application/x-oleobject" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112">

    <param name="filename" value="<?php echo $filepath?>">
    <param name="Showcontrols" value="True">
    <param name="autoStart" value="True">
    <div style="text-align:center">
        <audio controls>
            <source src="<?php echo $filepath; ?>" type="audio/ogg">
            <source src="<?php echo $filepath; ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <br><br><br>
    </div>

    <script>
        var myAudio = document.getElementById("audio1");
        myAudio.onseeking = function(){};
    </script>


          
          
          <!-- Comments go down here somewhere-->
       
              
<?php
	}
}
else
{
?>
<meta http-equiv="refresh" content="0;url=browse.php">
<?php
}
?>
</body>
</html>
