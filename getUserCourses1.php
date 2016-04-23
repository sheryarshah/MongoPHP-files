<?php

$m = new MongoClient();
$db = $m->sheryarTest; 

        $userIDKey ="";
        foreach ($_POST as $key => $value) {
                switch ($key) {
                        case 'userIDKey':
                                $userIDKey = $value;
                                break;
                        default:
                                break;
                }
        }

$doc = $db->Courses;
$result = $doc -> find(array('NetID' => $userIDKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo  $entry['Course'];
        echo "\n";
}

?>
