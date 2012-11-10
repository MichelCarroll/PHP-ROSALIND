<?php

require('common/bootstrap.php');

$strand = new NucleicAcid(str_split(APP_DATASET));
echo $strand->getReverseComplement();