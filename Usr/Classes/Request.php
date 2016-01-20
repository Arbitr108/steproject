<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 14.01.2016
 * Time: 20:44
 */

namespace PG\Classes;


class Request
{
	protected static $_instance;

	protected function __construct(){}

	public static function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new static;
		}
		return self::$_instance;
	}

	public static function getRequestUri(){
		return $_SERVER['REQUEST_URI'];
	}

	public static function getParam($param, $default = null){
		return isset($_GET[$param]) ? $_GET[$param] : $default;
	}

	public static function getPost($param, $default = null)
	{
		return isset( $_POST[$param] ) ? $_POST[$param] : $default;
	}

	public static function getMethod(){
		return $_SERVER['REQUEST_METHOD'];
	}
}