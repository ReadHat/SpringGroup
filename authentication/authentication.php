<?php
require_once("../DB/DB.class.php");
require_once("../Template/Template.php");

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

$query = "select user.username, user.userpass, user.realname, role.rolename from user, user2role, role where user.userid = user2role.userid and user2role.roleid = role.roleid and user.username = '{$_POST['usr']}';";
$result = $db->dbCall($query);

$exist = false;
$role = array();

#This part is for checking if the UserName that user typed exists.
if(isset($_POST['usr']) && isset($_POST['passwd'])){
	if (!empty($_POST['usr']) && !empty($_POST['passwd'])){
		foreach($result as $self){
			if($_POST['usr'] == $self['username']){
				$exist = true;
				$role[] += $self['rolename'];
				$realname = $self['realname'];
				$password = $self['userpass'];
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
		if (password_verify($_POST['passwd'], $password)){
			$_SESSION['usrname'] = $_POST['usr'];
			$_SESSION['role'] = $role;
			$_SESSION['login'] = true;
			$_SESSION['realname'] = $realname;
			if(isset($_SESSION['usrname']) && isset($_SESSION['role'])){
				header("Location: ../HomePage/HomePage.php");
			}
		}else{
			print "Wrong Username or Password.";
		}
	}
}


print $page->getBottomSection();
?>
