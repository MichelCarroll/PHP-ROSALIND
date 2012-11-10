<?php

require('common/bootstrap.php');

$strandStrings = explode(PHP_EOL, trim(APP_DATASET));
if(count($strandStrings) != 2)
{
  throw new Exception('Dataset fuckup');
}

$strand1 = new DNA($strandStrings[0]);
$strand2 = new DNA($strandStrings[1]);

echo $strand1->getHammingDistance($strand2) . PHP_EOL;