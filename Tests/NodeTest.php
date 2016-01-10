<?php
use PG\Classes\Node;
use PG\Exceptions\NodeChildAlreadyExistsException;

/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 18:58
 */
class NodeTest extends PHPUnit_Framework_TestCase
{
	protected static $_node_name = 'test_node';
	protected static $_child_node_name = 'child_test_node';
	protected $node;

	public function setUp()
	{
		$this->node = new Node(static::$_node_name);
	}

	/**
	 * Let's check the environment by instatiating the Node object
	 */
	public function testClassInstantiated(){
		$this->assertInstanceOf('PG\Classes\Node', $this->node,  'The Node exists');
	}

	/**
	 * Checks whether the Node can store children nodes
	 */
	public function testNodeStoresTheListOfChildren(){
		$this->assertClassHasAttribute('_children', 'PG\Classes\Node');
	}

	/**
	 * Checks whether the child is stored correnctly
	 */
	public function testNodeCanStoreAChild(){
		$this->node->add(new Node(static::$_child_node_name));
		$children = $this->node->getChildren();
		$this->assertNotEmpty($children, "The Node child was not stored");
		$this->assertEquals(static::$_child_node_name, $children[static::$_child_node_name]->getName(), "The Node child name is wrong");
	}

	/**
	 * Checks that the child's name is unique between the current node children
	 * @expectedException NodeChildAlreadyExistsException
	 */
//	public function testThrowsExceptionIfTheChildAlreadyExists(){
//		$this->node->add(new Node(static::$_child_node_name));
//	}

	

}
