<?php
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
                    <li><a href="#">Maybe fill with something?</a></li>
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
  <form class="form-horizontal" method="post" action="media_upload_process.php" enctype="multipart/form-data" >

    <fieldset>
      <legend>Upload Media</legend>
      <div class="form-group">
        <label for="mediaTitle" class="col-lg-2 control-label">Media Title:</label>
        <div class="col-lg-10">
          <input type="text" name="mediaTitle" />
        </div>
      </div>
      <div class="form-group">
        <label for="mediaDescription" class="col-lg-2 control-label">Media Description:</label>
        <div class="col-lg-10">
          <input type="textarea" name="mediaDescription" />
        </div>
      </div>
      <div class="form-group">
        <label for="mediaTags" class="col-lg-2 control-label">Media Tags:</label>
        <div class="col-lg-10">
          <input type="textarea" name="mediaTags" />
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
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Add a Media: </label><label style="color:#663399"><em> (Each file limit 10M)</em></label><br/>
        <div class="col-lg-10">
          <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
          <input name="file" type="file" size="50" />
          <br>
          <input value="Upload" class="btn btn-primary" name="submit" type="submit" />
        </div>
      </div>
    </fieldset>
  </form>
</div>
</body>
</html>
