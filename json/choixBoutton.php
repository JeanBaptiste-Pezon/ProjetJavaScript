<?php
session_start();
$resultat = new stdClass();

$choix=$_POST['bt'];

$resultat->result = $choix;
$resultat->message = 'bjr';
$resultat->est_connecte = true;

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($resultat);