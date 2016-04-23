<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$courseIDKey ="";
foreach($_POST as $key => $value){
         switch ($key) {
                case 'courseIDKey':
                        $courseIDKey = $value;
                        break;      
         }
}


$doc = $db->Questions;
$result = $doc -> find(array('Course' => $courseIDKey));

error_reporting(E_ERROR);

foreach ($result as $entry) {
    echo  $entry['Question'];                     
        echo "\n";
}


?>
