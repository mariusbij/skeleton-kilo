<?php
//just checking if autoload works
require 'vendor/autoload.php';

use Marius\Kilo\Cars\Jeep;

$jeep = new Jeep();

$jeep->horn();
