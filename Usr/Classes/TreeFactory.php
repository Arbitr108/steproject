<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 10.01.2016
 * Time: 11:48
 */

namespace PG\Classes;


class TreeFactory
{
	public static function factory($className){
		return new $className();
	}
}