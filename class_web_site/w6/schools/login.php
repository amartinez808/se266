<?php
    include_once __DIR__ . "/models/model_schools.php";
    include_once __DIR__ . "/includes/functions.php";
    

    if (isPostRequest()) {
        $username = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'userPassword');
        // your logic here
        if(!empty($username)){
        if(!empty($password)) {
           $host = "localhost";
           $dbusername = "root";
           $dbpassword = "antonio";
           $dbname = "se266_antonio";
           //Create connection
           $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

           if(mysqli_connect_error()){
               die('Connection Error'('. mysqli_connect_errno() .')  
               . mysqli_connect_error());
           }
           else{
               $sql = "INSERT INTO account (userName, userPassword)
               values ('$username','$password')";
               if ($conn->query($sql)){
                   echo "inserted new record succesfully";
               }
               else{
                   echo "Error: ". $sql ."<br>". $$conn->error;
               }
               $conn->close();
           }
        }  
       else{
           echo "Password can't be empty";
           die();
       }
        }
        else{
            echo "Username cant be empty";
            die();
        }





    }

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        #mainDiv {margin-left: 100px; margin-top: 100px;}
        .col1 {width: 100px; float: left;}
        .col2 {float: left;}
        .rowContainer {clear: left; height: 40px;}
        .error {margin-left: 100px; clear: left; height: 40px; color: red;}
    </style>
<title>Schools Upload</title>
</head>
<body>

    <div id="mainDiv">
        <form method="post" action="login.php">
           
            <div class="rowContainer">
                <h3>Please Login</h3>
            </div>
            <div class="rowContainer">
                <div class="col1">User Name:</div>
                <div class="col2"><input type="text" name="userName" value="donald"></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password" value="duck"></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
            </div>
            
        </form>
        
    </div>


</body>
</html>