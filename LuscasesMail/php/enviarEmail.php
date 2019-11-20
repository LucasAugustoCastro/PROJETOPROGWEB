<?php
session_start(); 

$xml_remetente = new DOMDocument("1.0");
$xml_remetente->formatOutput = true;
$xml_remetente->preserveWhiteSpace = false;
$xml_object2 = simplexml_load_file('../database/contas/contas.xml') or die("Error: 1 Cannot create object");

$xml_enviado = new DOMDocument("1.0");

foreach($xml_object2 as $users){		
	if($users['email'] == $_POST['email']){
		$remetenteName = substr($_POST['email'], 0, strpos($_POST['email'], "@"));
		$xml_remetente->load("../database/email/inbox/".$remetenteName.".xml") or die("Error:2 Cannot create object");
		$xml_object = simplexml_load_file("../database/email/inbox/".$remetenteName.".xml") or die("Error:3 Cannot create object");
		$xml_inbox_email= $xml_remetente->createElement("email");

		$cont = $xml_object->count();

		$xml_inbox_email -> setAttribute("id", $cont);
		$xml_inbox_email -> setAttribute("remetente", $_SESSION['user']);
		$xml_inbox_email -> setAttribute("titulo", $_POST['titulo']);
		$xml_inbox_email -> setAttribute("conteudo", $_POST['mensagem']);

		$xml_remetente->getElementsByTagName("inbox")->item(0)->appendChild($xml_inbox_email);

		$xml_enviado->load("../database/email/enviado/".$_SESSION['user'].".xml") or die("Error:4 Cannot create object");
		$xml_enviado_object = simplexml_load_file("../database/email/enviado/".$_SESSION['user'].".xml") or die("Error:5 Cannot create object");
		$xml_enviado_email= $xml_enviado->createElement("email");

		$cont2 = $xml_enviado_object->count();

		$xml_enviado_email -> setAttribute("id", $cont);
		$xml_enviado_email -> setAttribute("para", $remetenteName);
		$xml_enviado_email-> setAttribute("titulo", $_POST['titulo']);
		$xml_enviado_email -> setAttribute("conteudo", $_POST['mensagem']);

		$xml_enviado->getElementsByTagName("enviados")->item(0)->appendChild($xml_enviado_email);


		$xml_enviado->save("../database/email/enviado/".$_SESSION['user'].".xml");
		$xml_remetente->save("../database/email/inbox/".$remetenteName.".xml");
		$response = 0;
		break;
	} 
	else {
		$response = 1;		
	}
}

if ($response == 0){		
	echo json_encode(array('success' => 0));
} else if ($response == 1) {
	echo json_encode(array('success' => 1));
}
else{
	echo json_encode(array('success' => 2));
}

?>