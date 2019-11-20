<?php
session_start(); // nova sessao

//Load XML from file (or it could come from a POST, etc.)
$xml = simplexml_load_file("../database/email/enviado/".$_SESSION['user'].".xml") or die("Error:5 Cannot create object");

//Use XPath to find target node for removal
$target = $xml->xpath("//email[@id='temp']");

//If target does not exist (already deleted by someone/thing else), halt
if(!$target){
	$xml_object = simplexml_load_file('../database/email/enviado/'.$_SESSION['user'].'.xml') or die("Error: aaaaaaaa");
	echo json_encode($xml_object);
}
else if($xml->count() > 1){

//Import simpleXml reference into Dom & do removal (removal occurs in simpleXML object)
$domRef = dom_import_simplexml($target[0]); //Select position 0 in XPath array
$domRef->parentNode->removeChild($domRef);

//Format XML to save indented tree rather than one line and save
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save('../database/email/enviado/'.$_SESSION['user'].'.xml');
echo json_encode($dom);
}

else{
	echo json_encode(array('success' => 1));
}

?>