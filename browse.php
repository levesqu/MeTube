<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>All Media - MeTube</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>

    <!--the nav bar starts here -->
<?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->
</head>

<body>

<?php

	$query = "SELECT filename,mediaid from media"; 

	$result = mysql_query( $query );
	if (!$result){
	   die ("Could not query the media table in the database: <br />". mysql_error());
	}
?>
    <div style="background:#95a5a6;color:#FFFFFF; width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;">All Media</div>
	<table style="table-layout:fixed;" class="table table-hover">
		<?php
		$count=0;
		$maxcolumns=4;
			while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path
			{ 
				$filename=$result_row[0];
				$mediaid=$result_row[1];
			if ($count%$maxcolumns==0) { ?>
        	 <tr class="success">
        	 <?php
        	 }
         	$count=($count+1)%$maxcolumns;
        	 ?>
		       <form method="post" id="mediaform<?php echo $mediaid; ?>" action="media.php?id=<?php echo $mediaid; ?>">
	         </form>
		       <td style="text-align:center">
		         <a style="cursor:pointer; cursor:hand;" onclick="javascript:document.getElementById('mediaform<?php echo $mediaid; ?>').submit();"><?php echo $filename;?></a> 
		       </td>
		   <?php if ($count%$maxcolumns==0) { ?>
			</tr>
        	<?php
        		}
			}
		?>
<br>
	</table>

</body>
</html>
