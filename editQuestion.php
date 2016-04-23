<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db ->Users;

$courseIDKey ="";
$questKey ="";
$userIDKey ="";
$newQuest ="";
foreach($_POST as $key => $value){
         switch ($key) {
                case 'courseIDKey':
                        $courseIDKey = $value;
                        break;
                case 'questKey':
                        $questKey = $value;
                        break;      
                case 'userIDKey':
                        $userIDKey = $value;                
                        break;
                case 'newQuest':
                        $newQuest = $value;
                        break;
         }
}

$response = $db->execute('db.Questions.update({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "UserID" : "'.$userIDKey.'"},
                                {$set: {"Question" : "'.$newQuest.'"}}
);');

$doc = $db->Questions;
$result = $doc -> find(array('Course' => $courseIDKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo  $entry['Question'];
        echo "\n";
}

?>
