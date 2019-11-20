<?php
session_start(); // nova sessao
$xml_object = simplexml_load_file('../database/email/enviado/'.$_SESSION['user'].'.xml') or die("Error: aaaaaaaa");

echo json_encode($xml_object);
?>