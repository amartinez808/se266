 <?php
        
        include 'model_patients.php';
        include 'functions.php';
      if(isset($_GET['action']))
      {
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'patientId');

        if ($action == "update") {
            $row = getPatient($id);
            $patientFirst = $row['patientFirstName'];
            $patientLast = $row['patientLastName'];
            $pmarried = (int)$row['patientMarried'];
            $bdate = $row['patientBirthDate'];
        } else {
            $patientFirst = "";
            $patientLast= "";
            $pmarried = "";
            $bdate = "";
        }
          

      } 
      elseif (isset($_POST['action'])) {
        $action = filter_input(INPUT_POST, 'action');
        $id = (int)filter_input(INPUT_POST, 'patientId');
        $patientFirst = filter_input(INPUT_POST, 'patientFirst');
        $patientLast = filter_input(INPUT_POST, 'patientLast');
        $pmarried = (int)filter_input(INPUT_POST, 'pmarried');
        $bdate = filter_input(INPUT_POST, 'bdate');
      }
          
     
     if (isPostRequest() && $action == "add") {
     
         $result = addPatient ($id, $patientFirst, $patientLast, $pmarried, $bdate);
         header('Location: view.php');
         
     } elseif (isPostRequest() && $action == "update") {
         $result = updatePatient ($id,$patientFirst, $patientLast, $pmarried, $bdate);
         header('Location: view.php');
         
     }

  ?>
    

<html lang="en">
<head>
  <title><?= $action?>Edit Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <h2>Patient Intake form</h2>

   

    
  <div class="container">
    
    <h2>Edit | Patients</h2>


    <form class="form-horizontal" action="editPatient.php" method="post">

      <input type="hidden" name="patientId" value=<?= $_GET['patientId'] ?>>
      <div class="form-group">
        <label class="control-label col-sm-2" for="patient_first">Patient First Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="patient_first" placeholder="First Name" name="patientFirst">
        </div>
      </div>
      


      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Patient Last Name:</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" id="patient_last" placeholder="Last Name" name="patientLast">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Married: </label>
        <input type="radio" name="pmarried" value="1">Yes
        <input type="radio" name="pmarried" value="0">No
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd"> Birth Date: </label>
        <input type = "date" name="bdate">
      </div>
      
      
      
      
      <div class="form-group">  
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="action" value="<?php echo $action; ?>" class="btn btn-default"><?php echo $action; ?></button>
        </div>
      </div>
    </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="view.php">View Patients</a></div>
</div>

</body>
</html>