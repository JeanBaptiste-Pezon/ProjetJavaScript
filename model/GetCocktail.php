<?php
/**
 * Created by PhpStorm.
 * User: Eliazp
 * Date: 17/03/2018
 * Time: 16:54
 */

public function getUser($email,$password)
{
    $dbLink = $this->dbConnect();

    $query = 'SELECT TYPECOMPTE,PRENOM FROM user WHERE EMAIL = "'. $email .'" AND MDP = "'.$password.'"';

    if (!($dbResult = mysqli_query($dbLink, $query))) {
        var_dump($_POST);
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    if ( $dbResult == $password ){

    }
    else{
        $rep = mysqli_fetch_assoc($dbResult);
        session_start();
        $_SESSION['type'] = $rep['TYPECOMPTE'];
        $_SESSION['nom'] = $rep['PRENOM'];
    }

}