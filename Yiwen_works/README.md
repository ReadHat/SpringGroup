+#creatting table
+CREATE TABLE ContactData (
+id int not null primary key auto_increment,
+EmailAddress varchar(255),
+PhoneNumber varchar(255),
+AdditionalComments varchar(255)
+);
+
+#adding names
+Print "<p><label class='b'> Phone Number: <input type = 'text' name = 'Phone'></label></p>";
+Print "<fieldset class='fieldset1'>";
+Print "<legend> Additional Comments:</legend>";
+Print "<label><textarea rows='10' cols='120' id='myText2' name = 'Comment'></textarea></label>";
+
+#adding testform2.php
+	#CHECKING DATABASE STATUS
+	if (!$db->getConnStatus()){
+		print "<h1>An error has occurred while trying connect to database!</h1>\n";
+		exit;
+	}
+	#INSERTTING DATA
+	$safe_email = $db->dbEsc($_POST['name']);
+	if (empty($_POST['Phone'])){
+		$safe_phone = $db->dbEsc("null");
+	}else{
+		$safe_phone = $db->dbEsc($_POST['Phone']);
+	}
+	$safe_comment = $db->dbEsc($_POST['Comment']);
+
+	$query_INSERT = "INSERT INTO contactdata (EmailAddress,PhoneNumber,AdditionalComments) " . 
+					"VALUES ('{$safe_email}', '{$safe_phone}', '{$safe_comment}')";
+		 
+	#CHECKING DATA THAT SHOULD NOT CONTAIN AT DATABASE
+
+	query_CHECK = "SELECT EmailAddress FROM contactdata";
+
+	$result = $db->dbCall($query_CHECK);
+
+	foreach($result as $email){
+		foreach($email as $value){
+			if ($value != $safe_email){
+				$exist = false;
+			}else{
+				$exist = true;
+			}
+		}		
+	}
+	#FINAL RESULTS
+	if ($exist == false){
+		$db->dbCall($query_INSERT); #insert satement
+		print "<h1>Thank you for contacting us, someone will get back to you soon</h1>";
+	}else{
+		print "<h1>You already contact us once!</h1>\n";
+		exit;
+	}
+
+#Do we need isset() ?
+
+#webpage's menu bar is not on top