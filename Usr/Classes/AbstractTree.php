<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 09.01.2016
 * Time: 18:03
 */

namespace PG\Classes;


abstract class AbstractTree
{
	// создает узел (если $parentNode == NULL - корень)
	abstract protected function createNode(Node $node,$parentNode=NULL);
	// удаляет узел и все дочерние узлы
	abstract protected function deleteNode(Node $node);
	// делает один узел дочерним по отношению к другому
	abstract protected function attachNode(Node $node,Node $parent);
	// получает узел по названию
	abstract protected function getNode($nodeName);
	// преобразует дерево со всеми элементами в ассоциативный массив
	abstract protected function export();
}