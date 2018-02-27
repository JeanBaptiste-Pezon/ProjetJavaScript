<?php

session_start();
$resultat = new stdClass();

$resultat->result = true;
$resultat->message = '';
$resultat->est_connecte = false;


if (isset($_SESSION['test'])) {

    $resultat->result = true;
    $resultat->message = 'bjr';
    $resultat->est_connecte = true;

}
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($resultat);