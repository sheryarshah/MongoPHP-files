<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db ->Users;

$courseIDKey ="";
$questKey ="";
$userIDKey ="";
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
         }
}

$doc = $db->Questions;
$result = $doc -> find(array('Course' => $courseIDKey, 'UserID' => $userIDKey));


$response = $db->execute('db.Questions.remove({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "UserID" : "'.$userIDKey.'"},
                                { justOne: true }
);');

$response1 = $db->execute('db.Replies.remove({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "UserID" : "'.$userIDKey.'"}
);');

$doc = $db->Questions;
$result = $doc -> find(array('Course' => $courseIDKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo  $entry['Question'];
        echo "\n";
}

?>
