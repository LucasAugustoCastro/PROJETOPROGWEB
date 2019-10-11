<?php
    $xml = new DOMDocument("1.0");
	$xml->preserveWhiteSpace = false;
	$xml->formatOutput = true;
	$xml->load("../database/contas/contas.xml");	
	
	//$xml_contas = $xml->createElement("contas");
    $xml_userinfo = $xml->createElement("userinfo");
	
	$xml_userinfo->setAttribute("nome",$_POST['nome']);
    $xml_userinfo->setAttribute("email",$_POST['email']);
    $xml_userinfo->setAttribute("senha",$_POST['senha']);
	
	$busca = file_get_contents('../database/contas/contas.xml');
		if (strpos($busca, $_POST['email']) !== false) {
			echo "E-mail {$_POST['email']} já existe!";
		}
		else{
			$xml->getElementsByTagName("contas")->item(0)->appendChild($xml_userinfo);
			$xml->save("../database/contas/contas.xml");
		echo "Conta {$_POST['email']} criada com sucesso!";		
	}	
?>
