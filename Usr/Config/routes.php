<?php

use PG\Classes\Router;

Router::getInstance()->setRoutes(
	[
		"/api/{treetype}/list" 						=> "\PG\Controllers\ApiController@index",
		"/api/{treetype}/attach/{source}/{target}" 	=> "\PG\Controllers\ApiController@attach",
		"/api/{treetype}/create/{source}/{target}?" => "\PG\Controllers\ApiController@create",
		"/api/{treetype}/delete/{node}" 			=> "\PG\Controllers\ApiController@delete",
	]
);