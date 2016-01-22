<?php
    /* Yegor Shemereko
     * Display signup data.
     */

    require 'includes/bdb.php';
    
    //ObservationModel class
    include 'models/hive_datamodel.php';
    
    // creating ObservationModel object
    $obsModel = new ObservationModel($db);
    
    // results from SELECT *
    $results = $obsModel->getAllObservations();
    
    include 'views/beedata_table.php';
    
    $db = null;
?>