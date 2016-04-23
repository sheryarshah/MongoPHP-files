<?php

$m = new MongoClient();
$db = $m->sheryarTest;

$courseIDKey ="";
$questKey ="";

foreach($_POST as $key => $value){
         switch ($key) {
                case 'courseIDKey':
                        $courseIDKey = $value;
                        break;  
                 case 'questKey':
                        $questKey = $value;
                        break;   
         }
}

$doc = $db->Replies;
$result = $doc -> find(array('Course' => $courseIDKey, 'Question' => $questKey));

error_reporting(E_ERROR);

//var_dump($result);

foreach ($result as $entry) {
    echo $entry['Reply'];
        echo "\n";
}

?>
