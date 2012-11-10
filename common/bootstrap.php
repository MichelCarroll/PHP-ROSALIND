<?php

if(isset($argv[1]))
{
  $filename = $argv[1];
}
else
{
  $filename = __DIR__.'/../data/'.str_replace('.php', '.txt', $_SERVER['SCRIPT_NAME']);
}

$filecontents = file_get_contents($filename);
define('APP_DATASET', $filecontents);




require('NucleicAcid.php');
require('FASTA.php');
require('DNA.php');
require('RNA.php');