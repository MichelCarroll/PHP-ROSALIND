<?php


require('common/bootstrap.php');

$fasta = new FASTA(APP_DATASET);

$resultMap = array();
foreach($fasta->getStrandMap() as $label => $strand)
{
  $resultMap[$label] = $strand->getGCContent();
}

asort($resultMap);

$winnerLabel = key($resultMap);
$winnerResult = current($resultMap);

echo '>'.$winnerLabel.PHP_EOL;
echo ($winnerResult*100).'%';
echo PHP_EOL;
