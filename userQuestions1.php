<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db ->Users;

$userIDKey ="";
$courseIDKey ="";
$questKey ="";

foreach($_POST as $key => $value){
         switch ($key) {
                case 'userIDKey':
                        $userIDKey = $value;
                        break;
                case 'courseIDKey':
                        $courseIDKey = $value;
                        break;
                case 'questKey':
                        $questKey = $value;
                        break;  
         }
}

$doc = $db->Questions;
$result = $doc -> find(array('Course' => $courseIDKey));

foreach($result as $entry){
        if($entry['Question'] == $questKey){
        exit("Duplicate");
}}

$response = $db->execute('db.Questions.insertOne({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "UserID" : "'.$userIDKey.'"
});');

$doc = $db->Questions;
$result = $doc -> find(array('Course' => $courseIDKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo  $entry['Question'], ": ", $entry['UserID'];
        echo "\n";
}

?>
