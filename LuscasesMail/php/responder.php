<?php
$remetente_info = array(
	"id" => $_POST['id'],
	"remetente" => $_POST['remetente'],
	"conteudo" => $_POST['conteudo'],
	"titulo" => $_POST['titulo'],
);
echo json_encode($remetente_info);
?>