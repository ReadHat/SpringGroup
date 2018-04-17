<?php

//=====================================================
//== Code for logging the current user off the sytem ==
//=====================================================

// Since we are using $_SESSION to manage the login session
//+in addition to the browser session, we really should destroy
//+it to be safe
session_destroy();

header('Location: ../HomePage/HomePage.php');

?>
