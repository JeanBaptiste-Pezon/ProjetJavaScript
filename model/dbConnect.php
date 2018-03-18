<?php
/**
 * Created by PhpStorm.
 * User: foral
 * Date: 17/03/2018
 * Time: 17:20
 */

class dbConnect
{
    function __construct()
    {

    }

    public function dbConnect()
    {
        try {
            $dbLink = new PDO('mysql:host=mysql-projetjspp.alwaysdata.net;dbname=projetjspp_cocktail', '153975', '123');
            return $dbLink;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}