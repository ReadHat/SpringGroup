<?php
require_once("../DB/DB.class.php");
require_once("../Template/Discover.php");

$db = new DB();
$page = new Template("Authentication Results");
$page2 = new Discover("Authentication Results");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setHeadSection("<script src='../JavaScript/script1.js'></script>");
$page->setTopSection();
$page->setBottomSection();
$page2->setNavSection();
$page2->setFootSection();

print $page->getTopSection();
print $page2->getNavSection();

if (!$db->getConnStatus()) {
print "<p class='f'>";
  print "An error has occurred with DB connection\n";
print "</p>";
  exit;
}

$safe_usr = $db->dbEsc($_POST['usr']);
$query = "select user.username, user.userpass, user.realname, role.rolename from user, user2role, role where user.userid = user2role.userid and user2role.roleid = role.roleid and user.username = '{$safe_usr}';";
$result = $db->dbCall($query);


$exist = false;
$role = array();

#This part is for checking if the UserName that user typed exists.
if(isset($_POST['usr']) && isset($_POST['passwd'])){
	if (!empty($_POST['usr']) && !empty($_POST['passwd'])){
		foreach($result as $self){
			if($_POST['usr'] == $self['username']){
				$exist = true;
				$role[] .= $self['rolename'];
				$realname = $self['realname'];
				$password = $self['userpass'];
			}
		}
    }elseif(empty($_POST['usr'])){
		print "<p class='f'>";
		print "Please type your Username.";
		print "</p>";
	}elseif(empty($_POST['passwd'])){
		print "<p class='f'>";
		print "Please type your Password.";
		print "</p>";
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
			print "<p class='f'>";
			print "Wrong Username or Password.";
			print "</p>";
		}
	}else{
		print "<p class='f'>";
		print "Wrong Username or Password.";
		print "</p>";
	}
}


print $page2->getFootSection();
print $page->getBottomSection();
?>
