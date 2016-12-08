<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/5
 * Time: 19:35
 */
namespace ApigilityCatworkFoundation\Base;

use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayObject as ZendArrayObject;

abstract class ApigilityCollection extends Paginator
{
    protected $itemType;

    public function getCurrentItems()
    {
        $set = parent::getCurrentItems();
        $collection = new ZendArrayObject();

        foreach ($set as $item) {
            $collection->append($this->createItem($item));
        }
        return $collection;
    }

    protected function createItem($item)
    {
        return new $this->itemType($item);
    }
}