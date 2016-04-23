<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db ->Users;

$courseIDKey ="";
$questKey ="";
$replyKey ="";
$userIDKey ="";

foreach($_POST as $key => $value){
         switch ($key) {
                case 'courseIDKey':
                        $courseIDKey = $value;
                        break;
                case 'questKey':
                        $questKey = $value;
                        break;      
                case 'replyKey':
                        $replyKey = $value;
                        break;
                case 'userIDKey':
                        $userIDKey = $value;                
                        break;
         }
}

$response = $db->execute('db.Replies.remove({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "Reply" : "'.$replyKey.'",
                                "UserID" : "'.$userIDKey.'"},
                                { justOne: true }
);');

$doc = $db->Replies;
$result = $doc -> find(array('Course' => $courseIDKey, 'Question' => $questKey));

error_reporting(E_ERROR);

//var_dump($result);

foreach ($result as $entry) {
    echo $entry['Reply'];
        echo "\n";
}

?>
