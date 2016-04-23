<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$user = $db->Users;

$userIDKey="";

foreach($_POST as $key => $value){
         switch ($key) {
        case 'userIDKey':
            $userIDKey = $value;
            break;
         }
}

$result = $user->find();

foreach($result as $entry){
        if($entry['NetID'] == $userIDKey){
        exit("Duplicate");
}}

$response = $db->execute('db.Users.insertOne({
                "NetID" : "'.$userIDKey.'"      
});');

error_reporting(E_ERROR);

$result = $user->find();

foreach ($result as $entry) {
    echo  $entry['NetID'];
        echo "\n";
}

?>
