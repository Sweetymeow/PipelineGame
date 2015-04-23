<?php
session_start();
// start a session for each user(end when your close brower).
$flashKey = isset($_GET['key1']);

if ($flashKey) { 
	// Get Data from Flash
	$saveKey = $_GET['key1'];
	$_SESSION["pipeNum"] = $_GET['key1'];
	$myfile = fopen("pipename.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $saveKey);
	$myfile = fopen("pipename.txt", "r") or die("Unable to open file!");
	echo "Accept key1 data: ";
	echo fgets($myfile);
	echo "\n";
	fclose($myfile);
}
// Get Data from Unity
if (isset($_GET['getkey'])) {
	// Read txt file in Sties Folder(LocalHost)
	$myunityfile= fopen("pipename.txt", "r") or die("Unable to open file!");
	//echo fgets($myunityfile);
	fclose($myunityfile);
	echo $_SESSION["pipeNum"];
	# code...
}

// define location of Parse PHP SDK, e.g. location in "Parse" folder
// Defaults to ./Parse/ folder. Add trailing slash
define( 'PARSE_SDK_DIR', './Parse/' );

require 'vendor/autoload.php';
 
// Add the "use" declarations where you'll be using the classes
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

ParseClient::initialize('BbrZSp4nxzHdR7KluZ4nhfbwcjnPq0I6mFWd1lSV', 'gCT5llenbFQcidG1zeIdGSfCiavCKyzInLZihgk2', 'BZsLFSeWkcT7nvaddlHY20LpP8GrGrxs3ZV9gSLb');
 

// save something to class TestObject
$testObject = ParseObject::create("TestObject");
$testObject->set("foo", "bar");
$testObject->save();

// get the object ID
echo $testObject->getObjectId();

echo '<h1>Users</h1>';

// get the first 10 users from built-in User class
$query = new ParseQuery("_User");
$query->limit(10);
$results = $query->find();

foreach ( $results as $result ) {
  // echo user Usernames
  echo $result->get('username') . '<br/>';
}

?>
