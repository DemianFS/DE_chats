<?php
/**
 * Created by PhpStorm.
 * User: Dema
 * Date: 11.11.2017
 * Time: 2:56
 */

session_start();

function PDO_SELECT ($sql)
{

    try {
        $PDO = new PDO('mysql:host=localhost;dbname=DeChat', 'root', '');


        return  $PDO->query($sql);


    } catch (PDOException $e) {

        return $e->getMessage();


    }
}
function PDO_WRITE ($sql)
{

    try {
        $PDO = new PDO('mysql:host=localhost;dbname=DeChat', 'root', '');


        return  $PDO->exec($sql);


    } catch (PDOException $e) {

        echo $e->getMessage();


    }
}
