<?php

function fizzbuzz($num){
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
}


function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}