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
		$url = "http://cnmtsrv2.uwsp.edu/~<user-xxx>/path/to/Data.php";
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

		if ($return == false){
			print "<p class='f'>";
			print "Could not connect to the authentication server.\n";
			print "</p>";
			exit;
		}

		if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200){
			print "<p class='f'>";
			print "Unacceptable HTTP response from authentication server.\n";
			print "</p>";
			exit;
		}

		curl_close($ch);
		$sumObject = json_decode($return,true);

	}elseif(empty($_POST['usr']) && !empty($_POST['passwd'])){
		print "<p class='f'>";
		print "Please type your username.\n";
		print "</p>";
		exit;
	}elseif(empty($_POST['passwd']) && !empty($_POST['usr'])){
		print "<p class='f'>";
		print "Please type your password.\n";
		print "</p>";
		exit;
	}else{
		print "<p class='f'>";
		print "Please type both of your username and your password.\n";
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
	print "ERROR: cannot send json to server.\n";
	print "</p>";
	exit;
}

#Print error message when connected to database failed.
if ($sumObject == "DB-error"){
	print "<p class='f'>";
	print "ERROR: cannot connected to database.\n";
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
