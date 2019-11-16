<?php
session_start(); // nova sessao
$xml_object = simplexml_load_file('../database/email/inbox/'.$_SESSION['user'].'.xml') or die("Error: Cannot create object");

echo json_encode($xml_object);
?>