<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db ->Users;

$courseIDKey ="";
$questKey ="";
$userIDKey ="";
$replyKey ="";
$newReply ="";
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
                case 'replyKey':
                        $replyKey = $value;
                        break;
                case 'newReply':
                        $newReply = $value;
                        break;
         }
}

$response = $db->execute('db.Replies.update({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "Reply" : "'.$replyKey.'",
                                "UserID" : "'.$userIDKey.'"},
                                {$set: {"Reply" : "'.$newReply.'"}}
);');

$doc = $db->Replies;
$result = $doc -> find(array('Course' => $courseIDKey, 'Question' => $questKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo  $entry['Reply'];
        echo "\n";
}

?>
