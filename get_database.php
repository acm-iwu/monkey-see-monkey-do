<?php
ini_set("auto_detect_line_endings", true);
$row = 1;

if (($handle = fopen("guide/examples/database.txt", "r")) !== FALSE) {
	$monkeys = array();
	$firsttime = true;
    while (($data = fgetcsv($handle, 1000, "	")) !== FALSE) {
    	if($firsttime) {
    	$firsttime = false; 
    	continue;
    	}
    	
        $monkey = array(
        	"id" => $data[0],
        	"sex" => $data[1],
        	"birthYear" => (int)$data[2],
        	"leftEar" => $data[3],
        	"rightEar" => $data[4],
        	"group" => $data[6],
        	"notes" => $data[7]
        	);
        	
        $monkeys[] = $monkey;
    }
    fclose($handle);
    print(json_encode($monkeys));
}
?> 