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
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->

</head>

<body>

<div class="addmargin">

<?php
if(isset($_GET['id'])) {
	$query = "SELECT * FROM media WHERE mediaid='".$_GET['id']."'";
	$result = mysql_query( $query );
	$result_row = mysql_fetch_row($result);
	
	//updateMediaTime($_GET['id']);
	
	$filename=$result_row[0];
	$filepath=$result_row[4];
    $mediatitle=$result_row[5];
    $mediadescription=$result_row[6];
	$type=$result_row[2];

	if(substr($type,0,5)=="image") //view image
	{
	?>
        <h3> Viewing Picture: <?php echo $result_row[5];?></h3>
        <br><br>
		<img src="<?php echo $filepath?>"/><br>
        <a href="<?php echo $filepath; ?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4]; ?>);">Download</a>
<?php
	}
	elseif (substr($type,0,5)=="video")//view movie
	{	
?>
	<h3>Viewing Video: <?php echo $result_row[5];?></h3>

    <br><br>

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
                <br>
            </div>

            <script>
                var myVideo = document.getElementById("video1");
                myVideo.onseeking = function(){};
            </script>
        </object>

        <a href="<?php echo $filepath; ?>" target="_blank"
           onclick="javascript:saveDownload(<?php echo $result_row[4]; ?>);">Download</a>

    <?php
    }
        elseif (substr($type,0,5)=="audio")// hear audio
        {
        ?>
        <h3>Listening To Audio: <?php echo $result_row[5];?></h3>

        <br><br>

        <object id="MediaPlayer" width=560 height=286 classid="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" standby="Loading Windows Media Player components…" type="application/x-oleobject" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112">
        <param name="filename" value="<?php echo $filepath?>">
        <param name="Showcontrols" value="True">
        <param name="autoStart" value="True">
        <div style="text-align:left">
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
</object>

            <a href="<?php echo $filepath; ?>" target="_blank"
               onclick="javascript:saveDownload(<?php echo $result_row[4]; ?>);">Download</a>
              
 <?php
	}
 else {
     //other media
     ?>


     <h3>Other File: <?php echo $result_row[5]; ?></h3>
     <br><br>
     <tr class="success">
         <td>
             <?php echo $filename; ?>
         </td>
         <td>
             <a href="<?php echo $filepath; ?>" target="_blank"
                onclick="javascript:saveDownload(<?php echo $result_row[4]; ?>);">Download</a>
         </td>
     </tr>
     <br><br>
     <?php

 }

	$mediaId = $_GET['id'];
	$username = $_SESSION['username'];
     ?>
<!-- favorite button -->

     <div class="btn-group btn-group-justified">
			<?php
			$favoritequery="select * from favorites where mediaid=$mediaId and username='$username';";
			$numrows=mysql_query($favoritequery);
			$is_favorite=mysql_num_rows($numrows);
			$channelquery="select channeltitle, channels.channelid from channelmedia join channels where channels.channelid = channelmedia.channelid and mediaid=$mediaId;";
			$channel=mysql_query($channelquery);
			$singlechannel=mysql_fetch_row($channel);
			$channeltitle=$singlechannel[0];
			$channelid=$singlechannel[1];
			if (isset($channelid)) {
				$subquery="select * from subs where channelid=$channelid and username='$username';";
				$subscription=mysql_query($subquery);
				$is_subbed=mysql_num_rows($subscription);
			}
			 ?>
<script type="text/javascript">
	function changeAction(type)
	{
		if (type=="unF")
		{ document.getElementById('button form').action="unfavorite_process.php";}
		else if (type=="F")
		{ document.getElementById('button form').action="favorite_process.php";}
		else if (type=="unS")
		{ document.getElementById('button form').action="unsubscribe_process.php";}
		else if (type=="S")
		{ document.getElementById('button form').action="subscribe_process.php";}
	}
</script>
			<form method="post" id="button form" action="" enctype="multipart/form-data">
			<?php
			if ($is_favorite)
			{
			?>
				<input onclick="changeAction('unF')" type="submit" class="btn btn-info" value="Unfavorite" name="unfavoriteMedia" />
				<input type="hidden" name="mediaid" value="<?php echo $mediaId?>">
			<?php
			} else {
			?>
             <input onclick="changeAction('F')" type="submit" class="btn btn-default" value="Favorite" name="favoriteMedia" />
             <input type="hidden" name="mediaid" value="<?php echo $mediaId?>">
         <?php
         }
         if (isset($channelid))
         {
		      if ($is_subbed)
				{ ?>
					<input onclick="changeAction('unS')" type="submit" class="btn btn-info" value="Unsubscribe" name="unsubscribe" />
					<input type="hidden" name="channelid" value="<?php echo $channelid?>">
				<?php
				} else {
				?>
		          <input onclick="changeAction('S')" type="submit" class="btn btn-default" value="Subscribe" name="subscribe" />
		          <input type="hidden" name="channelid" value="<?php echo $channelid?>">

		      <?php
		      } 
	      } ?>
	      </form>
		      </div>

<!--         <div class="btn-group">-->
<!--             <a href="" class="btn btn-default">Default</a>-->
<!--             <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>-->
<!--             <ul class="dropdown-menu">-->
<!--                 <li><a href="">Action</a></li>-->
<!--                 <li><a href="">Another action</a></li>-->
<!--                 <li><a href="">Something else here</a></li>-->
<!--             </ul>-->
<!--         </div>-->

<!--    <div class="btn-group">-->
<!--        <div class="btn-group">-->
<!--            <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">-->
<!--                Add To playlist <span class="caret"></span>-->
<!--            </a>-->
<!--            <ul class="dropdown-menu">-->
<!--                <li><a href="#">Playlist 1</a></li>-->
<!--                <li><a href="#">Playlist 2</a></li>-->
<!--                <li><a href="#">Playlist 2</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->

<!-- this shit broken -->
<script type="text/javascript">
function checkvalue(val)
{
    if(val==="add new")
    {
      document.getElementById('playlistTitleNew').style.display='block';
      document.getElementById('createAndAddToPlaylist').style.display='block';
      document.getElementById('addToPlaylist').style.display='none';
    }
    else
    {
      document.getElementById('playlistTitleNew').style.display='none'; 
		document.getElementById('createAndAddToPlaylist').style.display='none';
		document.getElementById('addToPlaylist').style.display='block';
    }
}
</script>

	<?php
		$playlistquery = "select * from playlists where username = '$username' and playlistid not in (select playlistid from playlistmedia where username='$username' and mediaid=$mediaId);";
		$playlistresult = mysql_query($playlistquery);
	?>
	<div class="form-group">
		<form class="form-horizontal" method="post" action="add_to_playlist_process.php" enctype="multipart/form-data">
			<label for="playlistTitle" class="control-label">Select playlist to add to:</label>
			<div class="input-group col-lg-4">
				<select class="form-control" onchange='checkvalue(this.value);' name="playlistTitle">
					<?php
					while ($singleplaylist = mysql_fetch_row($playlistresult))
					{ 
					$playlisttitle=$singleplaylist[1];
					?>
					<option value="<?php echo $playlisttitle; ?>"><?php echo $playlisttitle?></option>
					<?php
					}

					?>
					<option value="add new">Add to new playlist</option>
				</select>
				<input type="hidden" name="mediaid" value="<?php echo $mediaId; ?>" />
				<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="Add" id="addToPlaylist" name="addToPlaylist" />
				</span>
			</div>
			<div class="input-group col-lg-4">
				<input type="text" class="form-control" name="playlistTitleNew" id="playlistTitleNew" style='display:none;'/>
				<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="Add" id="createAndAddToPlaylist" name="createAndAddToPlaylist" style='display:none;'/>
				</span>
			</div>
		</form>
	</div>

<!-- comments thread -->

    <?php
    echo "<h4>Description: &nbsp;</h4> ";
    echo "<p>$mediadescription</p>";
  // Comments start-->
	$commentquery="select * from comments where mediaid='$mediaId'";
	$comments = mysql_query($commentquery);
	if (!$comments)
	{
		die("Could not query the comment table in the database: <br />".mysql_error());
	}
	?>
	<br><br>
	<fieldset class="form-horizontal">
		<legend>Comments</legend>
		<table class="table table-striped">
			<?php
				while ($singleComment = mysql_fetch_row($comments))
				{
					$commentId = $singleComment[0];
					$commentUser = $singleComment[2];
					$commentBody = $singleComment[3];
			?>
			<tr>
				<td><label class="control-label">
              <?php
              if($_SESSION['username'] != $commentUser){?>
                  <form id="startmessage<?php echo $commentId; ?>" method="post" action="messageThread.php">
                  		<a href="javascript:document.getElementById('startmessage<?php echo $commentId; ?>').submit();"><?php echo $commentUser; ?>:</a>
                      <input type="hidden" value="<?php echo $commentUser; ?>" name="sendMessageTo" />
                  </form>
                  <?php
              }else{
              ?>

					<form id="deletecomment<?php echo $commentId; ?>" method="post" action="delete_comment_process.php">
					<?php echo $commentUser; 
							echo ':';?>
						<a href="javascript:document.getElementById('deletecomment<?php echo $commentId; ?>').submit();"><small>Delete</small></a>
						<input type="hidden" value="<?php echo $commentId; ?>" name="commentId" />
						<input type="hidden" value="<?php echo $mediaId; ?>" name="mediaId" />
					</form>
                  <?php
              }
              ?>
          </label>
               		
				<br><p><?php echo $commentBody?></p>
				</td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td>
					<form class="form-horizontal" method="post" action="comment_process.php">
						<label class="control-label"><?php echo $_SESSION['username']?>:</label>
						<br>
						<textarea class="form-control" rows="3" name="userComment"></textarea>
						<input type="submit" class="btn btn-primary" value="Submit Comment"/>
						<input type="hidden" name="mediaid" value="<?php echo $mediaId?>"/>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>

   <!-- comments end here -->
</div>
<?php
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
