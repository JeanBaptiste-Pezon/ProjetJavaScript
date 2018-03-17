<?php
/**
 * Created by PhpStorm.
 * User: Eliazp
 * Date: 17/03/2018
 * Time: 16:56
 */

class AddCocktail extends DbConnect
{

    function __construct()
    {

    }

    public function addCocktail($id, $titre, $resume)
    {
        $dbLink = $this->dbConnect();

        $query = 'INSERT INTO `ingredient` (`description`) VALUES (\'' . $description. '\' )';

        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
}