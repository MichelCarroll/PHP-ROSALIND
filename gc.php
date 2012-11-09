<?php

require('common/bootstrap.php');

$fasta = new FASTA(APP_DATASET);

foreach($fasta->getStrandMap() as $strand)
{
  var_dump($strand->getGCContent());
}