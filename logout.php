<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

        <title>Browse - MeTube</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Media browse</title>
        <link rel="stylesheet" type="text/css" href="css/default.css" />

    <!--the nav bar starts here -->
    <?php require 'navigation.php'; ?>
    <!-- nav bar ends here -->


</head>
<body>


<?php
session_destroy();
header( "refresh:1; url= index.php" );
?>

<p class="text-primary">
    You have successfully logged out
</p>


</body>
</html>
