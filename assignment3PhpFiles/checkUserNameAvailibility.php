<?php
// this script will force users to have unique usernames

$dbhostname = 'mysql1.cs.clemson.edu';
 
$dbusername = 'assignment4_v3ok';
 
$dbpassword = 'clemson2015';
 
$conn = mysql_connect($dbhostname, $dbusername, $dbpassword); // try and connect to the databse with credentials
 
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
 // check to see if the URL has the required fields 
if (isset ($_GET["username"]))
{
		$username = $_GET["username"];
}
// make sure the username field is not empty
if(empty($username))
{
echo ('Username field is empty');
exit;
}
else
{
//echo 'MySQL Connected successfully'."<BR>";
 
mysql_select_db("assignment4_v3ok") or die(mysql_error());
// select from the user table to make sure the username is not already in the database 
 $result = mysql_query("SELECT * FROM User WHERE username = '$username'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);
if($row[1] == null) // get the output of the mysql query
echo "Username not found"; // if the username did not exist in the external database
else
echo "Username Taken"; // if the username DID exist in the external database
//echo $row[1]; 

mysql_close($conn);
}
