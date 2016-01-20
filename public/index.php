<?php
use PG\Classes\Kernel;

require __DIR__.'/../vendor/autoload.php';
/**
 * Todo: The request processing
 */
require __DIR__.'/../Usr/Config/routes.php';


Kernel::process();


