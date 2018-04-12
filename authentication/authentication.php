<?php
require_once("DB.class.php");
require_once("Template.php");
require_once("const.php");

#$_SESSION['UsrName'] = $_POST['usr'];

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

#$hash_code = password_hash("123",PASSWORD_DEFAULT);
#print $hash_code;

#var_dump($result);
if(isset($_POST['usr']) && isset($_POST['passwd'])){
	foreach($result as $self){
		#print "username: " . $self['username'] . "role:" . $self['rolename'] . "<br>";
		if ($_POST['usr'] == $self['username']){
			$hash_code = password_hash($_POST['passwd'],PASSWORD_DEFAULT);
			#print password_verify($self['userpass'],$hash_code);
			if (password_verify($self['userpass'],$hash_code)){
				#echo "loged!";
				$_SESSION['UsrName'] = $_POST['usr'];
				$_SESSION['role'] = $self['rolename'];
			}else{
				echo "Wrong username or passsword";
			}
		}
	}
}else{
	print "post not working!";
}

if (isset($_SESSION['UsrName']) && isset($_SESSION['role'])){
	if(!empty($_SESSION['UsrName']) && !empty($_SESSION['role'])){
		echo "Welcome! ". $_SESSION['UsrName'] . ", you login as " . $_SESSION['role'];
	}
}
print $page->getBottomSection();
?>