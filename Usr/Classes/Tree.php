<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 17:39
 */

namespace PG\Classes;


use PG\Exceptions\NodeNotFoundException;

class Tree extends AbstractTree
{
	use NodeSearch;

	private $_root = [];

	public function getChildren(){
		return $this->_root;
	}

	public function createNode(Node $node, $parentNode = NULL)
	{
		if(is_null($parentNode)){
			//Rewriting the Tree Root
			$this->_root = [];
			$this->_root[$node->getName()] = $node;
		}else{
			$newParent = $this->getNode($parentNode->getName());
			$newParent->add($node);
		}
		return $this;
	}

	public function deleteNode(Node $node)
	{
		$result  = $this->search($node, $this->_root);
		if($result)
			unset($result);
		return $this;
	}

	public function attachNode(Node $node, Node $parent)
	{
		$newParent = $this->getNode($parent->getName());
		if($node->hasParent()){
			$node->getParent()->forgetChild($node);
		}
		$newParent->add($node);
		return $this;
	}

	public function &getNode($nodeName)
	{
		$node = $this->search($nodeName, $this->getChildren());
		if(!$node){
			throw new NodeNotFoundException($nodeName);
		}
		return $node;
	}

	public function export()
	{
		echo '<pre/>';
		var_export($this->_root);
	}
}