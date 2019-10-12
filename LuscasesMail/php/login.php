<?php

	// Use simplexml to make an object out of it
$xml_object = simplexml_load_file('../database/contas/contas.xml') or die("Error: Cannot create object");

// Cycle through the object until you find a match
foreach($xml_object as $users){	
    if($users['email'] == $_POST['email'] and $users['senha'] == $_POST['senha']){
       echo json_encode(array('success' => 1));
    } else {
		echo json_encode(array('success' => 0));
	}
}
?>