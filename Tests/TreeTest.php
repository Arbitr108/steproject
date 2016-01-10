<?php
use PG\Classes\Node;
use PG\Classes\Tree;

/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 17:34
 */
class TreeTest extends PHPUnit_Framework_TestCase
{
	private $_tree;

	public function setUp()
	{
		$this->_tree = new Tree();
	}

	public function testTreeStoresTheListOfChildren(){
		$this->assertClassHasAttribute('_root', 'PG\Classes\Tree', "The Tree cannot differentiate the root!");
//		$this->assertClassHasAttribute('_children', 'PG\Classes\Tree');
	}

	/**
	 * Checks $tree->createNode(new Node('country'));
	 */
	public function testCreateNewNodesAtChildNodes(){
		// 1. создать корень country
		$this->_tree->createNode(new Node('country'));
		$this->assertArrayHasKey('country', $this->_tree->getChildren());

		// 2. создать в нем узел kiev
		$this->_tree->createNode(new Node('kiev'), $this->_tree->getNode('country'));
		$this->assertArrayHasKey('kiev', $this->_tree->getNode('country')->getChildren());

		// 3. в узле kiev создать узел kremlin
//		var_export($this->_tree->getChildren());die();
		$this->_tree->createNode(new Node('kremlin'), $this->_tree->getNode('kiev'));
		$this->assertArrayHasKey('kremlin', $this->_tree->getNode('kiev')->getChildren());

		// 4. в узле kremlin создать узел house
		$this->_tree->createNode(new Node('house'), $this->_tree->getNode('kremlin'));
		$this->assertArrayHasKey('house', $this->_tree->getNode('kremlin')->getChildren());


		// 5. в узле kremlin создать узел tower
		$this->_tree->createNode(new Node('tower'), $this->_tree->getNode('kremlin'));
		$this->assertArrayHasKey('tower', $this->_tree->getNode('kremlin')->getChildren());


		// 6. в корневом узле создать узел moskow
		$this->_tree->createNode(new Node('moskow'), $this->_tree->getNode('country'));
		$this->assertArrayHasKey('moskow', $this->_tree->getNode('country')->getChildren());


		// 7. сделать узел kremlin дочерним узлом у moskow
		$this->_tree->attachNode($this->_tree->getNode('kremlin'), $this->_tree->getNode('moskow'));
		$this->assertArrayHasKey('kremlin', $this->_tree->getNode('moskow')->getChildren());


		// 8. в узле kiev создать узел maidan
		$this->_tree->createNode(new Node('maidan'), $this->_tree->getNode('kiev'));
		$this->assertArrayHasKey('maidan', $this->_tree->getNode('kiev')->getChildren());

		// 9. удалить узел kiev
		$this->_tree->deleteNode($this->_tree->getNode('kiev'));
		$this->assertNotContains('kiev', $this->_tree->getNode('country')->getChildren());

		print_r($this->_tree->export());
	}
}