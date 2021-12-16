<?php

    include ('db.php');
    
    
    function getPatients() {
        global $db;
        
        
        $results = [];

        $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY id"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }


    function addPatient ($fn, $ln, $mr, $dob) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO patients SET patientFirstName = :first, patientLastName = :last, patientMarried = :married, patientBirthDate = CAST(:birth AS DATE)" );

        $binds = array(
            ":first" => $fn,
            ":last" => $ln,
            ":married"=> $mr,
            ":birth"=> $dob,
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }


    function deletePatient($id) {
        global $db;
        
        $results = "Data was not Deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted!';
        }
        
        return ($results);
    }
   


    function updatePatient($id, $fn, $ln, $mr, $dob){
        global $db;
        $results = "Not Updated";

        $stmt = $db->prepare("UPDATE patients SET patientFirstName = :first, patientLastName = :last, patientMarried = :married, patientBirthDate = CAST(:birth AS DATE) WHERE id=:id" );

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':first' , $fn);
        $stmt->bindValue(':last', $ln);
        $stmt->bindValue(":married", $mr);
        $stmt->bindValue(":birth", $dob);
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data updated';
        }
        
        return ($results);
   
    }
    function getPatient($id) {
        global $db;
        
        
        $results = [];

        $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients WHERE id=:id"); 
        $stmt -> bindValue(':id', $id);

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }
    
    




    

?>