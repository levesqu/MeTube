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
if (isset ($_GET["name"], $_GET["username"], $_GET["password"], $_GET["privacy"]))
{
		$name = $_GET["name"];
		$username = $_GET["username"];
		$password = $_GET["password"];	
		$privacy = $_GET["privacy"];
}
$errorCount = 0;

if(empty ($name))
{
	echo ('name is empty');
	$errorCount++;
}
if(empty($username))
{
echo ('username empty');
	$errorCount++;

}
if(empty($password))
{
echo ('password empty');
	$errorCount++;

}
 if(empty($privacy))
{
echo ('privacy empty');
	$errorCount++;

}
if($errorCount == 0)
{

//echo sha1($password);
$hashPass = sha1($password);
//echo 'MySQL Connected successfully'."<BR>";
mysql_select_db("assignment4_v3ok") or die(mysql_error());

 $result = mysql_query("INSERT INTO User (name, username, password, private)
 VALUES('$name', '$username', '$hashPass', '&private')");
 
    
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

echo "Success";
mysql_close($conn);
}
else
{
mysql_close($conn);

}