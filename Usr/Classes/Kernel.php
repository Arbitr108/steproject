<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 14.01.2016
 * Time: 20:54
 */

namespace PG\Classes;


class Kernel
{
	public static function process(){
		Request::getInstance();
	}

	//parse requested uri and process the request

	//send the response
}