<?php

    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
	
	function calcAge($birthday) {
        $today = new DateTime('today');
        return date_diff(date_create($birthday), $today);
    }

  if(isset($_GET['id']))
{
    $id = filter_input(INPUT_GET, 'id');
    $action = filter_input(INPUT_GET, 'action');
    $row = getPatient($id);
    $fName = $row[0]['patientFirstName'];
    $lName = $row[0]['patientLastName'];
    $married = $row[0]['patientMarried'];
    $bDay = $row[0]['patientBirthDate'];
}
else 
{
    $id = "";
    $action = filter_input(INPUT_GET, 'action');
    $fName = "";
    $lName = "";
    $married = 0;
    $bDay = "";
}


  if(isset($_POST['action'])) 
{
    $action = filter_input(INPUT_POST, 'action');

    if(isPostRequest())
    {
        $fName = filter_input(INPUT_POST, 'firstName');
        $lName = filter_input(INPUT_POST, 'lastName');
        $married = filter_input(INPUT_POST, 'married');
        $bDay = filter_input(INPUT_POST, 'birthDate');

        if($action == "add")
        {
            $results = addPatient($fName, $lName, $married, $bDay);
            header('Location: search.php');
        }

        else if($action == "update")
        {
            $id = filter_input(INPUT_POST, 'id');
            header('Location: search.php');

            if(isset($_POST['btnDelete']))
            {
                $results = deletePatient($id);
                header('Location: search.php');
            }
            
            else if(isset($_POST['btnSubmit']))
            {
                $results = updatePatient($id, $fName, $lName, $married, $bDay);
                header('Location: search.php');
            }
            
        }

    }

}?>
