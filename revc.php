<?php

require('common/bootstrap.php');

$strand = new Strand(str_split(APP_DATASET));
echo $strand->getReverseComplement();