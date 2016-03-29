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
CREATE TABLE Patient (
userID INTEGER PRIMARY KEY NOT NULL,
name VARCHAR(99),
room int,
) ENGINE = INNODB;

*/
if (isset ($_GET["name"], $_GET["room"]))
{
		$name = $_GET["name"];
		$room = $_GET["room"];	
}
$errorCount = 0;

if(empty ($name))
{
	echo ('name is empty');
	$errorCount++;
}
if(empty($room))
{
echo ('room empty');
	$errorCount++;

}

if($errorCount == 0)
{

//echo sha1($password);
$hashPass = sha1($password);
//echo 'MySQL Connected successfully'."<BR>";
mysql_select_db("assignment4_v3ok") or die(mysql_error());

 $result = mysql_query("INSERT INTO Patient (name, room)
 VALUES('$name', '$room')");
 
    
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
else
{
	// just inserted into the database and then output the 1 record (this is used to add the assignment to the internal database)

$result2 = mysql_query("SELECT * FROM Patient WHERE name = '$name' and room = '$room' LIMIT 1");
if (!$result2) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
else
{
//////////
$hasData = false;
 $json = array();
while ($row = mysql_fetch_row($result2)) {
$next = array();
     $next['userID'] = $row[0];
     $next['name'] = $row[1];
     $next['room'] = $row[2];
array_push($json, $next);
    $hasData = true;
    
}
if($hasData == true)
{
echo json_encode($json);
}
else
{
echo 'No Results';
}

////////////////
}
//echo "Success";
}


mysql_close($conn);
}
else
{
mysql_close($conn);

}