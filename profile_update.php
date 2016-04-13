<?php
session_start();


    $query = "test";
    //$queryresult = mysql_query($query);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
<title>Profile Update</title>

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
<form class="form-horizontal" method="post"  action="profile_update_process.php" enctype="multipart/form-data" >
    <fieldset>
        <legend>Update Profile</legend>
        <!-- in here there was a second <form> tag and the top form tag at media upload procress in it not sure if that's what was meant to be but I changed it-->
	<table width="100%">
        <div class="form-group">
			<label for="inputUsername" class="col-lg-2 control-label">Update Username:</label>
            <div class="col-lg-10">
		    	<input class="form-control" id="inputUsername" type="text" name="username" value="">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Update Password:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputPassword" type="password" name="password" value="help")>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAge" class="col-lg-2 control-label">Update Age:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputAge" type="text" name="age" value="i dont really know">
            </div>
        </div>

        <div class="form-group">
            <label for="inputWorkplace" class="col-lg-2 control-label">Update Place of Work:</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputWorkplace" type="text" name="workplace" value="workname i dont really know">
            </div>
        </div>

<!--
        <tr>
			<td  width="20%"><label for="inputPassword" class="col-lg-2 control-label">Update Password:</label></td>
			<td width="80%"><input class="text"  type="password" name="password"><br /></td>
		</tr>
		<br>-->

		<!-- label and input values need to be changed   -->
		<!--<tr>
			<td  width="20%"><label for="inputAge" class="col-lg-2 control-label">Update Age:</label></td>
			<td width="80%"><input class="text"  type="text" name="age"><br /></td>
		</tr>
		<br>-->

		<!-- label and input values need to be changed   -->
		<!--<tr>
			<td  width="20%"><label for="input_place_of_work" class="col-lg-2 control-label">Update Place of Work:</label></td>
			<td width="80%"><input class="text"  type="text" name="workplace"><br /></td>
		</tr>-->

        <div class="col-lg-10 col-lg-offset-2">
			<input name="submit" type="submit" class="btn btn-primary" value="Update">
        </div>
 
    </fieldset>
 </form>
</div>
</body>
</html>
