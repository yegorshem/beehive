<?php
    /* Yegor Shemereko
     * Display signup data.
     */

    $username = "yegor_beeAdmin";
    $password = "VeryWeakPassword01";
    $hostname = "localhost";

    try
    {
        //Instantiate a database object
        $db = new PDO("mysql:host=$hostname; dbname=yegor_bee_database", $username, $password);
        
        echo 'Connected to database';
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
        
?>