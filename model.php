<?php


function getConnexion()
{
    try {
        $host = 'mysql:host=localhost;dbname=groupe2BP';
        return new PDO(
            $host,
            'root',
            '',
            array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
        );
    } catch (PDOException $ex) {
        die("connexion impossible<br>" . $ex->getMessage());
    }
}
