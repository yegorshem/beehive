<?php	//Yegor SHemereko	//1/18/2016	//First implemetation of Beehive Project

    //initilizing variables
    $hive_id = "";
    $collection_date = "";
    $sample_period = "";
    $mite_count = "";
    
    if (isset($_POST['submit'])) {
        
        //***Validate***
            $isValid = true;
            
            //hive_id
            if (!empty($_POST['hive_id'])) {
                $hive_id = $_POST['hive_id'];
            } else {
                echo '<p>Hive name not entered.</p>';
                $isValid = false;
            }
            
            //collection_date
            if (!empty($_POST['collection_date'])) {
                $collection_date = $_POST['collection_date'];
            } else {
                echo '<p>Collection date not entered.</p>';
                $isValid = false;
            }
            
            //sample_periode
            if (!empty($_POST['sample_period'])) {
                $sample_period = $_POST['sample_period'];
            } else {
                echo '<p>Date of sample collection not entered.</p>';
                $isValid = false;
            }
            //mite_count
            if (!empty($_POST['mite_count'])) {
                $mite_count = $_POST['mite_count'];
            } else {
                echo '<p>Mite count not entered.</p>';
                $isValid = false;
            }
            
        //***end validate***
        
        //Display summary
        if ($isValid) {
            
            //Connect to database
            require 'includes/bdb.php';
                
            //Define query
            $sql = "INSERT INTO hive_data VALUES (NULL, :hive_id, :collection_date, :sample_period, :mite_count, NULL)";
            
            //Prepare the statement
            $statement = $dbh->prepare($sql);
            
            //Bind parameters
            $statement->bindParam(':hive_id', $hive_id, PDO::PARAM_STR);
            $statement->bindParam(':collection_date', $collection_date, PDO::PARAM_STR);
            $statement->bindParam(':sample_period', $sample_period, PDO::PARAM_INT);
            $statement->bindParam(':mite_count', $mite_count, PDO::PARAM_INT);
            
            //Execute
            $result = $statement->execute();
    
            if ($result) {
                echo "<p>Thank you for your input.</p>";
                return;                
            } else {
                echo "<p>Error</p>";
            }
        }
    }
?>
