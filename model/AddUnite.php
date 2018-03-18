<?php
/**
 * Created by PhpStorm.
 * User: Eliazp
 * Date: 17/03/2018
 * Time: 16:56
 */

include 'dbConnect.php';

$dbC = new dbConnect();

$dbLink = $dbC->dbConnect();

$description = $_POST['desc'];

$request = $dbLink->prepare("INSERT INTO unite (description) 
                                              VALUES(:description)");

$request->bindValue(':description', $description, PDO::PARAM_STR);

if (!$request->execute()) {
    echo 'Erreur : ' , $request->errorInfo(), PHP_EOL;
    exit();
}