<?php
session_start(); 
$xml_object = simplexml_load_file("../database/email/inbox/".$_POST['remetente'].".xml") or die("Error: Cannot create object");
$xml_remetente = new DOMDocument("1.0");
$xml_remetente->formatOutput = true;
$xml_remetente->load("../database/email/inbox/".$_POST['remetente'].".xml") or die("Error: Cannot create object");

//$xml2 = new DOMDocument("1.0");
//$xml_enviado = simplexml_load_file("../database/email/enviado/".$_SESSION['user'].".xml") or die("Error: Cannot create object");

$xml_inbox_email= $xml_remetente->createElement("email");

$cont = $xml_object->count();

$xml_inbox_email -> setAttribute("id", $cont);
$xml_inbox_email -> setAttribute("remetente", $_SESSION['user']);
$xml_inbox_email -> setAttribute("titulo", "Re: ".$_POST['titulo']);
$xml_inbox_email -> setAttribute("conteudo", $_POST['conteudoR']);


$xml_remetente->getElementsByTagName("inbox")->item(0)->appendChild($xml_inbox_email);

$xml_remetente->save("../database/email/inbox/".$_POST['remetente'].".xml");

echo json_encode(array('success' => 0));

?>