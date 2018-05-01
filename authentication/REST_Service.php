<?php

require_once("../DB/DB.class.php");

if (!isset($_POST['data'])){
	print json_encode("No-data"); #indicate there is no data from _POST.
	exit;
}

//====================================
//== attempt to connect to database ==
//====================================

$db = new DB();
if (!$db->getConnStatus()) {
        print json_encode("DB-error"); #indicate not connected with database.
        exit;
}

// else...
$data = $_POST['data']; #Get data from json
$obj = json_decode($data, true); #Decode to be array from data.
$safe_usr = $db->dbEsc($obj['usrname']);
$query = "select user.username, user.userpass, user.realname, role.rolename from user, user2role, role where user.userid = user2role.userid and user2role.roleid = role.roleid and user.username = '{$safe_usr}';";

$result = $db->dbCall($query);

#Check if the username exsits on database.
if (empty($result)){
	print json_encode("Null"); #Once query returns NULL(it means no such username), change to String "Null" and return to client.
	exit;
}

#Verify password
if (!password_verify($obj['usrpasswd'], $result[0]['userpass'])){
	print json_encode("Null");
	exit;
}

//=========================================
//== everything looks good, so build the ==
//++ array to be encoded                 ==
//=========================================

// add username and real name
$user_info = array();
$user_info['usrname'] = $result[0]['username'];
$user_info['realname'] = $result[0]['realname'];

// add roles
$user_info['role'] = array();
foreach($result as $row) {
	$user_info['role'][] .= $row['rolename'];
}

// sent user info back to caller
print json_encode($user_info);

?>
