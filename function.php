<?php
include "mysqlClass.inc.php";


function user_exist_check ($username, $password, $firstname, $lastname, $age){
	$query = "select * from account where username='$username'";
	$result = mysql_query( $query );
	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}	
	else {
		$row = mysql_fetch_assoc($result);
		if($row == 0){
			$query = "insert into account(username,password,age,firstname,lastname) values ('$username','$password','$age', $firstname,'$lastname')";
			//echo "insert query:" . $query;
			$insert = mysql_query( $query );
			if($insert)
				return 1;
			else
				die ("Could not insert into the database: <br />". mysql_error());		
		}
		else{
			return 2;
		}
	}
}


function user_pass_check($username, $password)
{
	
	$query = "select * from account where username='$username'";
	//echo  $query;
	$result = mysql_query( $query );
		
	if (!$result)
	{
	   die ("user_pass_check() failed. Could not query the database: <br />". mysql_error());
	}
	else{
		$row = mysql_fetch_row($result);
		if(strcmp($row[1],$password))
			return 2; //wrong password
		else 
			return 0; //Checked.
	}	
}

function updateMediaTime($mediaid)
{
	$query = "	update  media set lastaccesstime=NOW()
   						WHERE '$mediaid' = mediaid
					";
					 // Run the query created above on the database through the connection
    $result = mysql_query( $query );
	if (!$result)
	{
	   die ("updateMediaTime() failed. Could not query the database: <br />". mysql_error());
	}
}

function upload_error($result)
{
	//view erorr description in http://us2.php.net/manual/en/features.file-upload.errors.php
	switch ($result){
	case 1:
		return "UPLOAD_ERR_INI_SIZE";
	case 2:
		return "UPLOAD_ERR_FORM_SIZE";
	case 3:
		return "UPLOAD_ERR_PARTIAL";
	case 4:
		return "UPLOAD_ERR_NO_FILE";
	case 5:
		return "File has already been uploaded";
	case 6:
		return  "Failed to move file from temporary directory";
	case 7:
		return  "Upload file failed";
	}
}

function update_profile_info($u_name, $u_pass, $u_age, $u_workplace, $u_aboutme, $u_firstname, $u_lastname)
{
	//You can write your own functions here.

	//if(isset($u_age)) {
	if($u_age != "") {
		$query = "update account set age='$u_age' WHERE username='$u_name'";
		$queryresult = mysql_query($query);
	}

	//if(isset($u_workplace)) {
	if($u_workplace != "") {
		$query = "update account set workplace='$u_workplace' WHERE username='$u_name'";
		$queryresult = mysql_query($query);
	}

	//if(isset($u_pass)) {
	if($u_pass != "") {
		$query = "update account set password='$u_pass' WHERE username='$u_name'";
		$queryresult = mysql_query($query);
	}
	if($u_aboutme != "") {
		$query = "update account set aboutme='$u_aboutme' WHERE username='$u_name'";
		$queryresult = mysql_query($query);
	}
    if($u_firstname != "") {
        $query = "update account set firstname='$u_firstname' WHERE username='$u_name'";
        $queryresult = mysql_query($query);
    }
    if($u_lastname != "") {
        $query = "update account set lastname='$u_lastname' WHERE username='$u_name'";
        $queryresult = mysql_query($query);
    }
 return 1;
}
	
?>
