<?php
    $xml = new DOMDocument("1.0");
	$xml->preserveWhiteSpace = false;
	$xml->formatOutput = true;
	$xml->load("../database/contas/contas.xml");	
	
    $xml_userinfo = $xml->createElement("userinfo");
	
	$xml_userinfo->setAttribute("nome",$_POST['nome']);
    $xml_userinfo->setAttribute("email",$_POST['email']);
    $xml_userinfo->setAttribute("senha",$_POST['senha']);
	
	$busca = simplexml_load_file('../database/contas/contas.xml');
	
	foreach($busca as $contas) {	
		if( $contas['email'] == $_POST['email']){
			$achou = true;        
		} else {
			$achou = false;
		}
	}

	if ($achou){
		echo json_encode(array('success' => 0));	
	} else {
		$xml->getElementsByTagName("database")->item(0)->appendChild($xml_userinfo);
		$xml->save("../database/contas/contas.xml");
		echo json_encode(array('success' => 1));	
	}	
	
?>
