<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 14.01.2016
 * Time: 21:33
 */

namespace PG\Classes;


class Router
{
	protected static $_routes = [];
	protected static $_instance;

	protected function __construct(){}

	public static function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new static;
		}
		return self::$_instance;
	}

	public static function getRoutes(){
		return self::$_routes;
	}

	public static function setRoutes($routes){
		self::$_routes = $routes;
	}
}