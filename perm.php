<?php

require('common/bootstrap.php');

$length = APP_DATASET;
$integers = return_integers($length);

$permutations = return_permutations($integers);
echo count($permutations) . PHP_EOL;
foreach($permutations as $perm)
{
  echo implode(' ', $perm) . PHP_EOL;
}



function return_permutations($digits)
{
  if(!count($digits))
  {
    return array();
  }
  else if(count($digits) == 1)
  {
    return array($digits);
  }
  
  $return = array();
  foreach($digits as $key => $digit)
  {
    $remainingDigits = arrayCopy($digits);
    unset($remainingDigits[$key]);
    $permutations = return_permutations($remainingDigits);
    foreach($permutations as $perm)
    {
      $return[] = array_merge(array($digit), $perm);
    }
  }
  return $return;
}


function return_integers($n)
{
  $return = array();
  for($x = 1; $x <= $n; $x++) {
    $return[] = $x;
  }
  return $return;
}


function arrayCopy( array $array ) {
        $result = array();
        foreach( $array as $key => $val ) {
            if( is_array( $val ) ) {
                $result[$key] = arrayCopy( $val );
            } elseif ( is_object( $val ) ) {
                $result[$key] = clone $val;
            } else {
                $result[$key] = $val;
            }
        }
        return $result;
}