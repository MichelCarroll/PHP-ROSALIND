<?php

require('common/bootstrap.php');

$nucleiotides = str_split(APP_DATASET);

$counts = array_count_values($nucleiotides);
ksort($counts);

echo implode(' ', $counts);