<?php
include_once "function.php";
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>Media Upload</title>

    <!--the nav bar starts here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->

<?php
	$channelid=$_POST['channelid'];
	$query = "select * from channels where channelid=$channelid;";
	$result = mysql_query($query);
	$result_row = mysql_fetch_row($result);
	$channelTitle=$result_row[1];
	$channelDescription=$result_row[2];
?>

</head>

<body>

<div class="form-group">
  <form class="form-horizontal" method="post" action="add_media_to_channel_process.php" enctype="multipart/form-data" >
	<input type="hidden" name="channelid" value="<?php echo $channelid; ?>" />
    <fieldset>
      <legend>Add Media To Channel</legend>
      <div class="form-group">
        <label for="channelTitle" class="col-lg-2 control-label">Channel Title:</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="channelTitle" value="<?php echo $channelTitle; ?>" disabled=""/>
        </div>
      </div>
      <div class="form-group">
        <label for="channelDescription" class="col-lg-2 control-label">Channel Description:</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="channelDescription" rows=3 name="ChannelDescription" disabled=""><?php echo $channelDescription; ?></textarea>
        </div>

      <div class="form-group">
          <?php
            $username = $_SESSION['username'];
            $query = "SELECT * from media WHERE username='$username' and mediaid NOT IN (select media.mediaid from media join channelmedia on media.mediaid=channelmedia.mediaid)"; 
            $result = mysql_query( $query );

            if (!$result){
              die ("Could not query the media table in the database: <br />". mysql_error());
            }
          ?>
          <p></p> 
    <label class="col-lg-2 control-label" style="width:100%; margin:auto; text-align:center; padding-top: 10px; padding-bottom: 10px;"> Select Media to Add to Channel:</label>
    <p></p> 

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
             <a href="media.php?id=<?php echo $mediaid;?>" target="_blank"><?php echo $filename;?></a> 
           </td>
           <td>
             <input name="mediaid[]" value="<?php echo $mediaid; ?>"type="checkbox"/>
           </td>
      </tr>
          <?php
      }
    ?>
<br>
  </table>


        <div class="col-lg-10">
          <input value="Create Channel" class="btn btn-primary" name="submit" type="submit" />
        </div>

      </div>
    </fieldset>
  </form>
</div>
</body>
</html>
