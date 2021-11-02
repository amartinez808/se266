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
   














    /*function addTeam2 ($t, $d) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");
       
        $stmt->bindValue(':team', $t);
        $stmt->bindValue(':division', $d);
       
        
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
       
        $stmt->closeCursor();
       
        return ($results);
    }

   /* $teams = getTeams();
    $team = $teams[0];
    echo $team['teamName'];
    
   
    
    //   $result = addTeam2 ('Ajax', 'Eredivisie');
    //   echo $result;*/
    
    

?>

