<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 21:28
 */

namespace PG\Exceptions;


class NodeNotFoundException extends Steproject_Exception
{
	public function __construct($node_name)
	{
		parent::__construct("The node {$node_name} was not found in the tree");
	}
}