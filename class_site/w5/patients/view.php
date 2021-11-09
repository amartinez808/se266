<?php
        
        include 'model_patients.php';
        include 'functions.php';
        if (isPostRequest()){
            $id = filter_input(INPUT_POST, 'patientId');
            deletePatient($id);
        }
        $patients = getPatients();
    ?>
    
<html lang="en">
<head>
  <title>View Patients Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>Patient Name</h1>
    
  
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Marrital Status</th>
                        <th>Birth Date</th>
                    </tr>
                </thead>
                <tbody>
            
                
                <?php foreach ($patients as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['patientFirstName']; ?></td>
                        <td><?php echo $row['patientLastName']; ?></td>            
                        <td><?php echo $row['patientMarried']; ?></td>            
                        <td><?php echo $row['patientBirthDate']; ?></td> 
                        
                       <td><a href="editPatient.php?action=update&patientId=<?= $row['id']; ?>">Edit</a></td>
                             <td>
                                <form action="view.php" method="post">
                                    <input type="hidden" name="patientId" value="<?php echo $row['id'];?>"/>
                                    <button class="btn glyphicon glyphicon-trash" type="submit"></button>
                                </form>
                            </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
        <br />
        <a href="addPatient.php">Add Patient |</a>
        <hr>
        <a href="deletePatient.php">Delete Patient |</a>
    </div>
    </div>
</body>
</html>