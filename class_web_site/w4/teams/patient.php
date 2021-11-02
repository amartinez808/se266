 <?php
        
        include 'model_patients.php';
        include 'functions.php';

        if (isPostRequest()) {
          $patientFirst = filter_input(INPUT_POST, 'patientFirst');
          $patientLast = filter_input(INPUT_POST, 'patientLast');
          $pmarried = (int)filter_input(INPUT_POST, 'pmarried');
          $bdate = filter_input(INPUT_POST, 'bdate');
           
          $result = addPatient($patientFirst, $patientLast, $pmarried, $bdate);
        }
    ?>
    

<html lang="en">
<head>
  <title>Add Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <h2>Patient Intake form</h2>

   

    
  <div class="container">
    
    <h2>Add Patients</h2>


    <form class="form-horizontal" action="patient.php" method="post">


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
        <button type="submit" class="btn btn-default">Add Patient</button>
        <?php
            if (isPostRequest()) {
                echo $result;
            }
        ?>
      </div>
    </div>


  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="view.php">View Patients</a></div>
</div>

</body>
</html>