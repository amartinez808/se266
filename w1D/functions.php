<?php

function fizzbuzz($num){
    for ($num = 1; $num <= 100; $num++)
    {
      if ( $num%2 == 0 && $num%3 == 0 )
       {
         echo $num . " FizzBuzz"."\n" ;
       }
      else if ( $num%2 == 0 ) 
       {
         echo $num. " Fizz"."\n";
       }
         else if ( $num%3 == 0 ) 
       {
         echo $num. " Buzz"."\n";
       }
         else
       {
         echo $num."\n";
       }
     }
}
?>


}