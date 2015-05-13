<?php
date_default_timezone_set('America/New_York');
// define location of Parse PHP SDK, e.g. location in "Parse" folder
// Defaults to ./Parse/ folder. Add trailing slash
define( 'PARSE_SDK_DIR', 'vendor/parse/' );

require_once('FirePHPCore/FirePHP.class.php');
require 'vendor/autoload.php';
  
// Add the "use" declarations where you'll be using the classes
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;

ParseClient::initialize('BbrZSp4nxzHdR7KluZ4nhfbwcjnPq0I6mFWd1lSV', 
	'gCT5llenbFQcidG1zeIdGSfCiavCKyzInLZihgk2', 
	'BZsLFSeWkcT7nvaddlHY20LpP8GrGrxs3ZV9gSLb');

ob_start();
session_start();
// start a session for each user(end when your close brower).
$flashKey = isset($_GET['key1']);

if ($flashKey) { 
	// Get Data from Flash
	$saveKey = $_GET['key1'];
	$saveId = $_GET['keyId'];
	$_SESSION["pipeNum"] = $_GET['key1'];
	// save something to class TestObject
	$pipeNumObj = ParseObject::create("PipeNumObj");
	if($saveId = $_GET['keyId']){
		$pipeNumObj->set("UserID", $saveId);
	}else{
		$pipeNumObj->set("UserID", "FlashUser");
	}
	$pipeNumObj->set("pipeNum", $saveKey);
	$pipeNumObj->save();
}

// Get Data from Unity
if (isset($_GET['getkey'])) {
	$pipeNumQuery = new ParseQuery("PipeNumObj");
	$pipeNumQuery->limit(5);
	$pipeNumQuery->descending("createdAt");
	$resultsNum = $pipeNumQuery->first();
	//echo $resultsNum->get('UserID') . '<bt>'. $resultsNum->get('pipeNum') ;
	if(isset($_SESSION["pipeNum"])){
		echo $_SESSION["pipeNum"];
	}else if($resultsNum->get('pipeNum')){
		echo $resultsNum->get('pipeNum');
	}
	# code...
}

if (isset($_POST['UserID'])) {
	$userInput = $_POST['UserID'];
    $userPipeQuery = new ParseQuery("PipeNumObj");
    $userPipeQuery->equalTo("UserID", $userInput);
    $userPipeQuery->limit(5);
    $userPipeQuery->descending("createdAt");
    $resultsNum = $userPipeQuery ->first();
    if(isset($_SESSION["pipeNum"])){
        echo $_SESSION["pipeNum"];
    }else if($resultsNum->get('pipeNum')){
        echo $resultsNum->get('pipeNum');
    }
	# code...
}
?>
