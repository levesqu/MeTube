<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	include_once "function.php";
	$username = $_SESSION['username'];
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
<?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->
</head>

<body>

<h2> <?php echo $_SESSION['username'];?> Welcome To MeTube!</h2>

<?php require 'browse_media.php'; ?>

<p class="text-primary">Click Below to upload a file</p>
<!--<a href='./media_upload.php'  style="background-color:#95a5a6; color:#FFFFFF; padding-left:50px; padding-right: 50px; padding-bottom: 10px; padding-top: 10px;">Upload Media</a> -->
<a href="media_upload.php" class="btn btn-primary col-lg-2">Upload Media</a>

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
				$filepath = $result_row[4];
		?>

        	 <tr class="success">
				<td />
		       <td>
		         <a href="media.php?id=<?php echo $mediaid;?>" target="_blank">&nbsp;<?php echo $filename;?></a> 
		       </td>
		       <td>
		         <a href="<?php echo $filepath;?>" target="_blank" onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a>
		       </td>
			</tr>
        	<?php
			}
		?>
<br>
	</table>

</body>
</html>
