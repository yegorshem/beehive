<?php

    //initilizing variables
    $hive_id = "";
    $collection_date = "";
    $mite_count = "";
    
    if (isset($_POST['submit'])) {
        
        //***Validate***
            $isValid = true;
            
            //$fname
            if (!empty($_POST['hive_id'])) {
                $hive_id = $_POST['hive_id'];
            } else {
                echo '<p>Please enter a hive name.</p>';
                $isValid = false;
            }
            
            //$lname
            if (!empty($_POST['collection_date'])) {
                $collection_date = $_POST['collection_date'];
            } else {
                echo '<p>Please enter date of sample collection.</p>';
                $isValid = false;
            }
            
            //$company
            if (!empty($_POST['mite_count'])) {
                $mite_count = $_POST['mite_count'];
            } else {
                echo '<p>Please enter a mite count.</p>';
                $isValid = false;
            }
            
        //***end validate***
        
        //Display summary
        if ($isValid) {
            
            //Connect to database
            require 'includes/bdb.php';
                
            //Escape the data
            $hive_id = mysqli_real_escape_string($cnxn, $hive_id);
            $collection_date = mysqli_real_escape_string($cnxn, $collection_date);
            $mite_count = mysqli_real_escape_string($cnxn, $mite_count);
           

 
            //Write to database
            $sql = "INSERT INTO hive_data VALUES (NULL, '$hive_id', '$collection_date', NULL, '$mite_count', NULL)";
            
            
            //Display Summary and thank you message
            $result = @mysqli_query($cnxn, $sql);
            if ($result) {
                echo "<p>Thank you for your input.</p>";
                return;                
            } else {
                echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
            }
        }
    }
?>
