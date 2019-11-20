<?php
$xml = new DOMDocument("1.0");
$xmlInbox = new DOMDocument("1.0");
$xmlLixeira = new DOMDocument("1.0");
$xmlEnviados = new DOMDocument("1.0");
$xmlInbox->preserveWhiteSpace = false;
$xmlInbox->formatOutput = true;
$xmlLixeira->preserveWhiteSpace = false;
$xmlLixeira->formatOutput = true;
$xmlEnviados->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load("../database/contas/contas.xml");	
$xml_object = simplexml_load_file('../database/contas/contas.xml') or die("Error: Cannot create object");

$xml_userinfo = $xml->createElement("userinfo"); // xml conta

//xml inbox
$xml_inbox = $xmlInbox->createElement("inbox");
$xmlInbox -> appendChild($xml_inbox);
$xml_inbox_email = $xmlInbox->createElement("email");
$xml_inbox -> appendChild($xml_inbox_email);
$xml_inbox_email -> setAttribute("id", "0");
$xml_inbox_email -> setAttribute("remetente", "admin");
$xml_inbox_email -> setAttribute("titulo", "temp inbox");
$xml_inbox_email -> setAttribute("conteudo", "temp inbox conteudo");

//xml lixeira
$xml_Lixeira = $xmlLixeira->createElement("enviados");
$xmlLixeira -> appendChild($xml_Lixeira);

//xml enviados
$xml_Enviados = $xmlEnviados->createElement("enviados");
$xmlEnviados -> appendChild($xml_Enviados);
$xml_Enviados_email = $xmlEnviados->createElement("email");
$xml_Enviados -> appendChild($xml_Enviados_email);
$xml_Enviados_email -> setAttribute("id", "temp");

$xml_userinfo->setAttribute("nome",$_POST['nome']);
$xml_userinfo->setAttribute("email",$_POST['email']."@luscasesmail.com");
$xml_userinfo->setAttribute("senha",$_POST['senha']);

foreach($xml_object as $users){		
	if($users['email'] == $_POST['email']){
		$response = 0;
		break;
	} 
	else if($_POST['senha'] != $_POST['confirmaSenha']){
		$response = 2;
		break;
	}
	else {
		$response = 1;
		
	}
}

if ($response == 0){		
	echo json_encode(array('success' => 0));
} else if ($response == 2) {
	echo json_encode(array('success' => 2));
}
else{
	$xml->getElementsByTagName("contas")->item(0)->appendChild($xml_userinfo);
	$xml->save("../database/contas/contas.xml");
	$xmlInbox->save("../database/email/inbox/".$_POST['email'].".xml");
	$xmlLixeira->save("../database/email/lixeira/".$_POST['email'].".xml");
	$xmlEnviados->save("../database/email/enviado/".$_POST['email'].".xml");
	echo json_encode(array('success' => 1));
}

?>
