<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 18:02
 */

namespace PG\Classes;


use PG\Exceptions\NodeChildAlreadyExistsException;

class Node
{
	private $_name;
	private $_children = [];
	private $_parent;

	public function __construct($name)
	{
		$this->_name = $name;
	}

	public function add(Node $child){
		if($this->childExists($child)){
			throw new NodeChildAlreadyExistsException("The node {$this->getName()} already has the child {$child->getName()}");
		}
		$child->setParent($this);
		$this->_children[$child->getName()] = &$child;
	}

	public function getName(){
		return $this->_name;
	}

	public function getChildren(){
		return $this->_children;
	}

	public function childExists($child){
		return array_key_exists($child->getName(), $this->getChildren());
	}

	public function forgetChild($child){
		if($child instanceof Node)
			$child_name = $child->getName();
		else
			$child_name = $child;
		unset($this->_children[$child_name]);
	}

	public function setParent(&$parent){
		$this->_parent = &$parent;
	}

	public function getParent(){
		return $this->_parent;
	}

	public function hasParent(){
		return !is_null($this->_parent);
	}
}