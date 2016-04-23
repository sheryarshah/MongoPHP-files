<?php

$m = new MongoClient();
$db = $m->sheryarTest;

//$userIDKey ="";
$courseIDKey ="";
$questKey ="";
$replyKey ="";
$userID ="";
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
                 case 'userID':
                        $userID = $value;
                        break;
         }
}

$response = $db->execute('db.Replies.insertOne({
                                "Course" : "'.$courseIDKey.'",
                                "Question" : "'.$questKey.'",
                                "Reply" : "'.$replyKey.'",
                                "UserID" : "'.$userID.'"
});');

$doc = $db->Replies;
$result = $doc -> find(array('Course' => $courseIDKey, 'Question' => $questKey));

error_reporting(E_ERROR);

//var_dump($result);

foreach ($result as $entry) {
    echo $entry['Reply'];
        echo "\n";
}

?>
