<?php
    $xml = new DOMDocument("1.0");
    $xml_email = $xml->createElement("email");

    $xml_conta = $xml->createElement("conta");
    $xml_conta->setAttribute("email","admin@luscasesmail.com");
    $xml_conta->setAttribute("senha","root");

    $xml_email->appendChild($xml_conta);
    $xml->appendChild($xml_email);
    $xml->save("contas.xml");
?>
