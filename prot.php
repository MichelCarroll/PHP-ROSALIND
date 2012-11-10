<?php

require('common/bootstrap.php');

$rna = new mRNA(APP_DATASET);
echo $rna->getCodedProtein() . PHP_EOL;