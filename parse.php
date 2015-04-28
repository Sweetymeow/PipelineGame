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

// save something to class TestObject
$testObject = ParseObject::create("TestObject");
$testObject->set("UserID", "sweetymeow4");
$testObject->save();
echo 'OK2';

// // get the object ID
echo $testObject->getObjectId();
echo 'OK';
echo '<h1>Users</h1>';

// get the first 10 users from built-in User class
$userQuery = new ParseQuery("TestObject");
$userQuery->limit(10);
$userResults = $userQuery->find();
echo 'OK';
foreach ( $userResults as $result ) {
  // echo user Usernames
  echo $result->get('UserID') . '<br/>';
}


// // get the first 10 users from built-in User class
// $query = new ParseQuery("_User");
// $query->limit(10);
// $results = $query->find();

// foreach ( $results as $result ) {
//   // echo user Usernames
//   echo $result->get('username') . '<br/>';
// }


?>
