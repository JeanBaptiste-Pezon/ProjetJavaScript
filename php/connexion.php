<?php
session_start();

$resultat = new stdClass();

$resultat->result = true;
$resultat->message = '';
$resultat->est_connecte = false;

if (isset($_POST['username']) && isset($_POST['pass']) && $_POST['username'] == "a" && $_POST['pass'] == "a"){
    $username = $_POST['username'];
    $pass     = $_POST['pass'];

    $resultat->est_connecte = true ;
    $_SESSION['test'] = "fegzeg";

} else {
    $resultat->result = false;
    $resultat->message = 'Paramètres incorrects';
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($resultat);