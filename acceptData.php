<?php
date_default_timezone_set('America/New_York');
// define location of Parse PHP SDK, e.g. location in "Parse" folder
// Defaults to ./Parse/ folder. Add trailing slash
define( 'PARSE_SDK_DIR', 'vendor/parse/' );

require 'vendor/autoload.php';
  
// Add the "use" declarations where you'll be using the classes
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;

ParseClient::initialize('BbrZSp4nxzHdR7KluZ4nhfbwcjnPq0I6mFWd1lSV', 
	'gCT5llenbFQcidG1zeIdGSfCiavCKyzInLZihgk2', 
	'BZsLFSeWkcT7nvaddlHY20LpP8GrGrxs3ZV9gSLb');

session_start();
// start a session for each user(end when your close brower).
$flashKey = isset($_GET['key1']);

if ($flashKey) { 
	// Get Data from Flash
	$saveKey = $_GET['key1'];
	$_SESSION["pipeNum"] = $_GET['key1'];
	// save something to class TestObject
	$pipeNumObj = ParseObject::create("PipeNumObj");
	$pipeNumObj->set("UserID", "flashKey");
	$pipeNumObj->set("pipeNum", $saveKey);
	$pipeNumObj->save();
}

// // get the object ID
// echo $testObject->getObjectId();

// echo '<h1>Users</h1>';

// // get the first 10 users from built-in User class
// $query = new ParseQuery("_User");
// $query->limit(10);
// $results = $query->find();

// foreach ( $results as $result ) {
//   // echo user Usernames
//   echo $result->get('username') . '<br/>';
// }

// Get Data from Unity
if (isset($_GET['getkey'])) {
	$pipeNumQuery = new ParseQuery("PipeNumObj");
	$pipeNumQuery->limit(1);
	$resultsNum = $pipeNumQuery->first();
	if(isset($_SESSION["pipeNum"])){
		echo $_SESSION["pipeNum"];
	}else if($resultsNum){
		echo $resultsNum;
	}
	# code...
}

if (isset($_POST['UserID'])) {
	$userInput = $_POST['UserID'];
	$pipeNumQuery = new ParseQuery("PipeNumObj");
	$pipeNumQuery->limit(1);
	$resultsNum = $pipeNumQuery->first();
	if(isset($_SESSION["pipeNum"])){
		echo $_SESSION["pipeNum"];
	}else if($resultsNum){
		echo $resultsNum;
	}
	# code...
}

?>
