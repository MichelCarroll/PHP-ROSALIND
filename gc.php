<?php


require('common/bootstrap.php');

$fasta = new FASTA(APP_DATASET);

$resultMap = array();
foreach($fasta->getNucleicAcidMap() as $label => $strand)
{
  $resultMap[$label] = $strand->getGCContent();
}

arsort($resultMap);
reset($resultMap);

$winnerLabel = key($resultMap);
$winnerResult = current($resultMap);

echo $winnerLabel.PHP_EOL;
echo round($winnerResult*100, 4).'%';
echo PHP_EOL;
