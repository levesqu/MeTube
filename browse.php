<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Browse - MeTube</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Media browse</title>
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
</head>

<body>
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
        <li class="active"><a href="./index.php">Home page <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Maybe fill with something?</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav> 
<!-- nav bar ends here -->


<p><?php echo $_SESSION['username'];?> Welcome To MeTube!</p>


<h3 class="">Click one of the options below to browse media.</h3>
<div class="btn-group btn-group-justified">
	<a href="./categories.php" class="btn btn-default">Categories</a>
	<a href="./favorites.php" class="btn btn-default">Favorites</a>
	<a href="./channels.php" class="btn btn-default">Channels</a>
	<a href="./playlists.php" class="btn btn-default">Playlists</a>
</div><br>

<p class="text-primary">Here you can upload all of your files just click the link below.</p><br>

<a href='media_upload.php'  style="background-color:#95a5a6; color:#FFFFFF; padding-left:50px; padding-right: 50px; padding-bottom: 10px; padding-top: 10px;"> &nbsp; Upload Media</a>
<div id='upload_result'>
<?php 
	if(isset($_REQUEST['result']) && $_REQUEST['result']!=0)
	{		
		echo upload_error($_REQUEST['result']);
	}
?>
</div>
<br/><br/>
<?php

	$username = $_SESSION['username'];
	$query = "SELECT * from media WHERE username='$username'"; 

	$result = mysql_query( $query );
	if (!$result){
	   die ("Could not query the media table in the database: <br />". mysql_error());
	}
?>
    <div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;"> My Media</div>
	<table class="table table-hover">
		<tr class="success">
			<td style="text-align:center">Filename</td>
			<td>&nbsp</td>
		</tr>
		<?php
			while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path
			{ 
				$mediaid = $result_row[3];
				$filename = $result_row[0];
				$filenpath = $result_row[4];
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
            	            <a href="<?php echo $filenpath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
                        </td>
			</tr>
        	<?php
			}
		?>
<br>


	</table>
</body>
</html>
