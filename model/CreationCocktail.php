<?php
/**
 * Created by PhpStorm.
 * User: foral
 * Date: 18/03/2018
 * Time: 15:13
 */

include 'dbConnect.php';

$dbC = new dbConnect();

$dbLink = $dbC->dbConnect();

$requestNb = $dbLink->prepare("SELECT COUNT *
                                       as nb
                                       FROM ingredient ");

if (!$requestNb->execute()) {
    echo 'Erreur : ' , $requestNb->errorInfo(), PHP_EOL;
    exit();
}

$requestIng = $dbLink->prepare("SELECT description
                                       FROM ingredient ");

if (!$requestIng->execute()) {
    echo 'Erreur : ' , $requestIng->errorInfo(), PHP_EOL;
    exit();
}

?>

<select name="ing">
    <?php

    for ($i = 0 ; $i < $requestNb['nb'] - 1 ; ++$i)
    {
        ?>
        <option value="<?php echo $requestIng['description'][$i] ?>"><?php echo $requestIng['description'][$i] ?></option>   <?php
    }
    ?>
</select>