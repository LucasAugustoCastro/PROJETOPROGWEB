<?php

session_start(); 

$xml = new DOMDocument("1.0");
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("../database/email/inbox/".$_SESSION['user'].".xml") or die("Error:2 Cannot create object");
$xml_object = simplexml_load_file("../database/email/inbox/".$_SESSION['user'].".xml") or die("Error:3 Cannot create object");

foreach($xml_object as $email){		
	if($email['id'] == $_POST['id']){
		$xml_object->parentNode->removeChild($email);
		$response = 0;
		break;
	} 
	else {
		$response = 1;		
	}
}

if ($response == 0){		
	echo json_encode(array('success' => 0));
} else{
	echo json_encode(array('success' => 1));
}
?>