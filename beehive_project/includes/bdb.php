<?php
    /* Yegor Shemereko
     * Not accessible/ private
     * Display signup data.
     */

    $username = "yegor_beeAdmin";
    $password = "VeryWeakPassword01";
    $hostname = "localhost";
    $database = "yegor_bee_database";
    
    $cnxn = @mysqli_connect($hostname, $username, $password,
                            $database)
            or die("Error connecting to database: " .
                    mysqli_connect_error());
?>