<?php

// YOUR SOCIAL ENGINE DATABASE SETTINGS

$database="localhost"; 
$user="";
$pw="";
$dbname="";


// SOCIAL ENGINE DIRECTORY

$socialdir="/social";  // Path to your SE directory



// WORDPRESS DIRECTORY

$wpdir="/blog";		// Path to your Wordpress




// DO NOT TOUCH ANYTHING BELOW!
// ----------------------------------------------------------------

$server = $_SERVER["DOCUMENT_ROOT"];

$connect = mysql_connect($database, $user, $pw);
mysql_select_db($dbname);

if (!$connect) {
    die('Impossibile connettersi al database: ' . mysql_error());
}

?>