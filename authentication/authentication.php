<?php
require_once("../DB/DB.class.php");
require_once("Template.php");

$db = new DB();
$page = new Template("Spring 2");
$page->setHeadSection("");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

if (!$db->getConnStatus()) {
  print "An error has occurred with DB connection\n";
  exit;
}

$query = "select username, role.rolename, user.userpass from user, user2role, role where user.userid = user2role.userid and user2role.roleid = role.roleid";
$result = $db->dbCall($query);

#This part is for checking if the UserName that user typed exists. 
if(isset($_POST['usr']) && isset($_POST['passwd'])){
	if (!empty($_POST['usr']) && !empty($_POST['passwd'])){
		foreach($result as $self){
			if($_POST['usr'] == $self['username']){
				$exist = true;
				$role = $self['rolename'];
				$hash_code = password_hash($self['userpass'],PASSWORD_DEFAULT); #we might not need this line of code.
				break;
			}
		}
    }elseif(empty($_POST['usr'])){
		print "Please type your Username.";
	}elseif(empty($_POST['passwd'])){
		print "Please type your Password.";
	}
}
#This part should check the UserName's password since UserName exists.
if (isset($exist)){
	if ($exist == true){
		#var_dump($hash_code);
		#var_dump(password_verify($_POST['passwd'], $hash_code));
		if (password_verify($_POST['passwd'], $hash_code)){
			$_SESSION['usrname'] = $_POST['usr'];
			$_SESSION['role'] = $role;
			$_SESSION['login'] = true;
			if(isset($_SESSION['usrname']) && isset($_SESSION['role'])){
				print "Welcome, " . $_SESSION['usrname'] . ", you loged in as " . $_SESSION['role'] . ".";
			}
		}else{
			print "Wrong Username or Password.";
		}
	}
}elseif(!isset($exist) && !empty($_POST['passwd']) && !empty($_POST['usr'])){
	print "There is wrong Username or password."; #Or There is no such account? 
}
print $page->getBottomSection();
?>