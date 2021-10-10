<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIZZ-BUZZ</title>
</head>
<body>
    <h1>Fizz Buzz</h1>

    <?php

    for ($i = 1; $i <= 100; $i++)
    {
      if ( $i%2 == 0 && $i%3 == 0 )
       {
         echo $i . " FizzBuzz"."\n" ;
       }
      else if ( $i%2 == 0 ) 
       {
         echo $i. " Fizz"."\n";
       }
         else if ( $i%3 == 0 ) 
       {
         echo $i. " Buzz"."\n";
       }
         else
       {
         echo $i."\n";
       }
     }
?>
</body>
</html>