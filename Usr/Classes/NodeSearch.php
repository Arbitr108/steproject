<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 21:10
 */

namespace PG\Classes;


trait NodeSearch
{
	public function &search($search, $children){

		foreach($children as $key => $childNode){
			if($key == $search || ($search instanceof Node && $search->getName() == $key)){
				return $children[$childNode->getName()];
			}
			if(!empty($childNode->getChildren())){
				return $this->search($search, $childNode->getChildren());
			}
		}
		return false;
	}
}