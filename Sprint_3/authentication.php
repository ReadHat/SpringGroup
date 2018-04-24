<?php
require_once("DB.class.php");

$db = new DB();

if (!$db->getConnStatus()) {
	print "An error has occurred with DB connection\n";
	exit;
}

if(isset($_POST['data'])){
	$data = $_POST['data']; #Get data from json
	$obj = json_decode($data, true); #Decode to be array from data.
	$safe_usr = $db->dbEsc($obj['usrname']);
	$query = "select user.username, user.userpass, user.realname, role.rolename from user, user2role, role where user.userid = user2role.userid and user2role.roleid = role.roleid and user.username = '{$safe_usr}';";
}else{
	print "No json data";
}

$exist = false;
$role = array();

#This part is for checking if the UserName that user typed exists.
if(isset($obj['usrname']) && isset($obj['usrpasswd'])){
	if (!empty($obj['usrname']) && !empty($obj['usrpasswd'])){
		$result = $db->dbCall($query);
		foreach($result as $self){
			if($obj['usrname'] == $self['username']){
				$exist = true;
				$role[] .= $self['rolename'];
				$realname = $self['realname'];
				$password = $self['userpass'];
			}
		}
    }elseif(empty($obj['usrname'])){
		print "Please type your Username.";
	}elseif(empty($obj['usrpasswd'])){
		print "Please type your Password.";
	}
}
#This part should check the UserName's password since UserName exists.
if (isset($exist)){
	if ($exist == true){
		if (password_verify($obj['usrpasswd'], $password)){
			print 'cool cool man';
			$_SESSION['usrname'] = $obj['usrname'];
			$_SESSION['role'] = $role;
			$_SESSION['login'] = true;
			$_SESSION['realname'] = $realname;
			if(isset($_SESSION['usrname']) && isset($_SESSION['role'])){
				header("Location: ../HomePage/HomePage.php");
			}
		}else{
			print "Wrong Username or Password.";
		}
	}elseif($exist == false){
		print "Wrong Username or Password.";
	}
}else{
	print "You must need to login before accessing this web page.";
}
?>