<?php
$db = new PDO('mysql:host=mysql-projetjspp.alwaysdata.net;port=3306;dbname=projetjspp_cocktail;charset=utf8;', '153975', '123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $db->exec("DROP TABLE IF exists recette");

    $db->exec("DROP TABLE IF exists ingredient");
    $db->exec("CREATE TABLE ingredient (" .
        "id MEDIUMINT PRIMARY KEY AUTO_INCREMENT, " .
        "description VARCHAR(20) DEFAULT NULL, " .
        "CONSTRAINT description_unique UNIQUE (description)" .
        ")");

    $db->exec("DROP TABLE IF exists unite");
    $db->exec("CREATE TABLE unite (" .
        "id MEDIUMINT PRIMARY KEY AUTO_INCREMENT, " .
        "description VARCHAR(20) DEFAULT NULL, " .
        "CONSTRAINT description_unique UNIQUE (description)" .
        ")");

    $db->exec("DROP TABLE IF exists cocktail");
    $db->exec("CREATE TABLE cocktail (" .
        "id MEDIUMINT PRIMARY KEY AUTO_INCREMENT, " .
        "titre VARCHAR(20) DEFAULT NULL, " .
        "resume TEXT(2000) DEFAULT NULL, " .
        "CONSTRAINT titre_unique UNIQUE (titre) " .
        ")");

    $db->exec("DROP TABLE IF exists recette");
    $db->exec("CREATE TABLE recette (" .
        "id MEDIUMINT PRIMARY KEY AUTO_INCREMENT, " .
        "id_cocktail MEDIUMINT NOT NULL, " .
        "id_ingredient MEDIUMINT NOT NULL, " .
        "id_unite MEDIUMINT NOT NULL," .
        "quantite INTEGER NOT NULL," .
        "FOREIGN KEY(id_cocktail) REFERENCES cocktail(id) ".
        "ON DELETE CASCADE  ON UPDATE CASCADE," .
        "FOREIGN KEY(id_ingredient) REFERENCES ingredient(id) " .
        "ON DELETE CASCADE  ON UPDATE CASCADE," .
        "CONSTRAINT fk_id_unite FOREIGN KEY(id_unite) REFERENCES unite(id) ".
        "ON DELETE CASCADE ON UPDATE CASCADE," .
        "CONSTRAINT ids_unique UNIQUE (id_cocktail, id_ingredient, id_unite)" .
        ")");

    echo "ca a marché ";
}catch (PDOExecption $e){
    echo $e;
}


