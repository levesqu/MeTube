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



<h2> <?php echo $_SESSION['username'];?> Welcome To MeTube!</h2>



<h4 class="addmargin">Click one of the options below to browse media.</h4><br>

<div class="btn-group btn-group-justified">
	<a href="./categories.php" class="btn btn-default">Categories</a>
	<a href="./favorites.php" class="btn btn-default">Favorites</a>
	<a href="./channels.php" class="btn btn-default">Channels</a>
	<a href="./playlists.php" class="btn btn-default">Playlists</a>
    <a href="./browse.php" class="btn btn-default">My Media</a>
</div><br>

<p class="text-primary">Click Below to upload a file</p>
<a href='./media_upload.php'  style="background-color:#95a5a6; color:#FFFFFF; padding-left:50px; padding-right: 50px; padding-bottom: 10px; padding-top: 10px;"> &nbsp; Upload Media</a>

<br>
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
		<?php
			while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path
			{ 
				$mediaid = $result_row[3];
				$filename = $result_row[0];
				$filenpath = $result_row[4];
		?>

        	 <tr class="success">
				<td />
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
