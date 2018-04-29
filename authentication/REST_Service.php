<?php

require_once("../DB/DB.class.php");

if(isset($_POST['data'])){
	$db = new DB();
	$data = $_POST['data']; #Get data from json
	$obj = json_decode($data, true); #Decode to be array from data.
	$safe_usr = $db->dbEsc($obj['usrname']);
	$query = "select user.username, user.userpass, user.realname, role.rolename from user, user2role, role where user.userid = user2role.userid and user2role.roleid = role.roleid and user.username = '{$safe_usr}';";
}else{
    print json_encode("No-data"); #indicate there is no data from _POST.
    exit;
}

if (!$db->getConnStatus()) {
	print json_encode("DB-error"); #indicate not connected with database.
	exit;
}else{
	$result = $db->dbCall($query);
}

#Check if the username exsits on database.
if (!empty($result)){
	print json_encode($result);
}else{
	print json_encode("Null"); #Once query returns NULL(it means no such username), change to String "Null" and return to client.
}

?>
