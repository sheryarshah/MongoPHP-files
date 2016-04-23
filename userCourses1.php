<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db ->Users;

$userIDKey ="";
$courseKey ="";

foreach($_POST as $key => $value){
         switch ($key) {
        case 'userIDKey':
            $userIDKey = $value;
            break;
                case 'courseKey':
            $courseKey = $value;
            break;
         }
}

$doc = $db->Courses;
$result = $doc -> find(array('NetID' => $userIDKey));

foreach($result as $entry){
        if($entry['Course'] == $courseKey){
        exit("Duplicate");
}}

$response = $db->execute('db.Courses.insertOne({
                                "NetID" : "'.$userIDKey.'",
                                "Course" : "'.$courseKey.'"
        
});');

$doc = $db->Courses;
$result = $doc -> find(array('NetID' => $userIDKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo $entry['Course'];
        echo "\n";
}

?>
