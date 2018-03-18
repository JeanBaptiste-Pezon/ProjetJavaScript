<?php
/**
 * Created by PhpStorm.
 * User: foral
 * Date: 18/03/2018
 * Time: 15:13
 */

include 'model/dbConnect.php';

$dbC = new dbConnect();

$dbLink = $dbC->dbConnect();

$resultat = new stdClass();
$resultat->ing =null;

$query = "SELECT description
          FROM ingredient ";
$result= $dbLink->query($query);
$lines = $result->fetchAll();
$resultat->ing = $lines;

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($resultat);
