<?php

require_once("../Template/Discover.php");

$page = new Discover("Authentication Results");
$page->setHeadSection("<link rel='stylesheet' href='../CSS/style.css'>");
$page->setTopSection();
$page->setBottomSection();
$page->setNavSection();
$page->setFootSection();
print $page->getTopSection();
print $page->getNavSection();

if (isset($_POST['usr']) && isset($_POST['passwd'])){
	if (!empty($_POST['usr']) && !empty($_POST['passwd'])){
		$data = array("usrname" => $_POST['usr'], "usrpasswd" => $_POST['passwd']);
		$dataJson = json_encode($data);

		$postString = "data=" . urlencode($dataJson);
		$contentLength = strlen($postString);

		$header = array(
			'Content-Type: application/x-www-form-urlencoded',
			'Content-Length: ' . $contentLength
		);

		#If you need to use my code plz change ur path that points to Data.php
		$url = "http://cnmtsrv2.uwsp.edu/~ychen799/SprintGroup/Server/Data.php";
		#---------------------------------------------------------------------

		$ch = curl_init();

		curl_setopt($ch,
			CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch,
			CURLOPT_POSTFIELDS, $postString);
		curl_setopt($ch,
			CURLOPT_HTTPHEADER, $header);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_URL, $url);

		$return = curl_exec($ch);
		$sumObject = json_decode($return,true);
		curl_close($ch);

	}elseif(empty($_POST['usr'])){
		print "<p class='f'>";
		print "Please type your Username.\n";
		print "</p>";
		exit;
	}elseif(empty($_POST['passwd'])){
		print "<p class='f'>";
		print "Please type your Password.\n";
		print "</p>";
		exit;
	}
}else{
	print "<p class='f'>";
    print "You must need to login before accessing this web page.\n"; #this will be returned when user type the path of authentication.php into browser.
	print "</p>";
	exit;
}

#Print error message when POST not working(cannot send to the Data.php), and exit.
if ($sumObject == "No-data"){
	print "<p class='f'>";
	print "ERROR: cannot send json to server\n";
	print "</p>";
	exit;
}

#Get informations and store those informations.
if ($sumObject != "Null"){
    $role = array();
	foreach($sumObject as $self){
		$role[] .= $self['rolename'];
		$realname = $self['realname'];
		$password = $self['userpass'];
		$username = $self['username'];
	}
}else{
	print "<p class='f'>";
    print "Wrong Username or Password.\n";
	print "</p>";
    exit;
}

#Check if the username's password is right.
if (isset($password)){
    if (password_verify($_POST['passwd'], $password)){
        $_SESSION['usrname'] = $username;
		$_SESSION['role'] = $role;
		$_SESSION['login'] = true;
        $_SESSION['realname'] = $realname;
        header("Location: ../HomePage/HomePage.php");
    }else{
		print "<p class='f'>";
        print "Wrong Username or Password.\n";
		print "</p>";
        exit;
    }
}

print $page->getFootSection();
print $page->getBottomSection();

?>
