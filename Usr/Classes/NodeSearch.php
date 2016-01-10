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
		if($search instanceof Node)
			$search = $search->getName();
		if(array_key_exists($search, $children))
			return $children[$search];
		elseif(!empty($children)) {
			foreach($children as $key => $childNode){
				if(!empty( $childNode->getChildren() )){
					return $this->search($search, $childNode->getChildren());
				}
			}
		}
		return false;
	}
}