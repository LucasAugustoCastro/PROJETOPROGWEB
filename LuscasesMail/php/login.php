<?php
$xml = simplexml_load_file('../database/contas/contas.xml');

foreach($xml as $contas) {	
    if( $contas['email'] == $_POST['email']){
		$achou = true;        
    } else {
		$achou = false;
	}
}

if ($achou){
	echo json_encode(array('success' => 1));	
} else {
	echo json_encode(array('success' => 0));	
}

?>