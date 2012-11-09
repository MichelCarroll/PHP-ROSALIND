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




function get_complement($strand)
{
  return strtr($strand, 'ATCG', 'TAGC');
}

function get_reverse($strand)
{
  return implode('', array_reverse(str_split($strand)));
}