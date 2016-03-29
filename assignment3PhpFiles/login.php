<?php
 
$dbhostname = 'mysql1.cs.clemson.edu';
 
$dbusername = 'assignment4_v3ok';
 
$dbpassword = 'clemson2015';
 
$conn = mysql_connect($dbhostname, $dbusername, $dbpassword);
 
if(!$conn)
{
 
  die('Could not connect: ' . mysql_error());
 
}
/*
CREATE TABLE User (
userID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(99),
username VARCHAR(64),
password VARCHAR(64),
privacy BOOLEAN
) ENGINE = INNODB;
*/
if (isset ($_GET["username"], $_GET["password"]))
{
		$username = $_GET["username"];
		$password = $_GET["password"];	
	
}
$errorCount = 0;


if(empty($username))
{
echo ('ERROR: username field empty');
	$errorCount++;

}
if(empty($password))
{
echo ('ERROR: password field empty');
	$errorCount++;

}

if($errorCount == 0)
{

//echo sha1($password);
$hashPass = sha1($password); // hash the password and use this in the database
//echo 'MySQL Connected successfully'."<BR>";
mysql_select_db("assignment4_v3ok") or die(mysql_error());

 $result = mysql_query("SELECT * FROM User WHERE username='$username' and password ='$hashPass' LIMIT 1");
 
    
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$foundUser = false;
$json = array();
while ($row = mysql_fetch_row($result)) {
  // echo  $row[0] . '*%@' . $row[1] . '*%@' . $row[2] . '*%@' . $row[3] . '*%@' . $row[4];
   $next = array();
     $next['userID'] = $row[0];
     $next['name'] = $row[1];
     $next['username'] = $row[2];
     $next['password'] = $password;
     $next['private'] = $row[4];
array_push($json, $next);
   $foundUser = true;
}

if(!$foundUser)
{
//echo "Failed";
$next = array();
$value = 'Wrong username or password';
$next['Failed'] = $value;
array_push($json, $next);
echo json_encode($json);
}
else
{
echo json_encode($json);

}
mysql_close($conn);
}
else
{
mysql_close($conn);

}