<!--
This entire add_channel file was copied and pasted directly from the media_upload file.
I have only changed some html, not sure how some of these html tags work that specify
something about "media" - Schafer
-->


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

<div class="form-group">
  <form class="form-horizontal" method="post" action="add_channel_process.php" enctype="multipart/form-data" >

    <fieldset>
      <legend>Add Channel</legend>
      <div class="form-group">
        <label for="mediaTitle" class="col-lg-2 control-label">Channel Title:</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="mediaTitle" />
        </div>
      </div>
      <div class="form-group">
        <label for="mediaDescription" class="col-lg-2 control-label">Channel Description:</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows=3 name="mediaDescription"></textarea>
        </div>
<!--      </div>
      <div class="form-group">
        <label for="mediaTags" class="col-lg-2 control-label">Media Tags:</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="mediaTags"></textarea>
        </div> 
      </div>
      <div class="form-group">
        <label for="mediaCategories" class="col-lg-2 control-label">Select Category:</label>
        <div class="col-lg-10">
          <select class="form-control" name="mediaCategory">
            <option>Sports</option>
            <option>Comedy</option>
            <option>Children</option>
            <option>News</option>
            <option>Pictures</option>
            <option>Text</option>
          </select>
        </div>
      </div> -->
      <div class="form-group">
          <?php
            $username = $_SESSION['username'];
            $query = "SELECT * from media WHERE username='$username'"; 
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
             <a href="media.php?id=<?php echo $mediaid;?>" target="_blank">&nbsp;<?php echo $filename;?></a> 
           </td>
           <td>
             <input name="file" type="checkbox" size="50" />
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
