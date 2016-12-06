<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/5
 * Time: 19:18
 */
namespace ApigilityCatworkFoundation\Base;

use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

abstract class ApigilityEntity
{
    protected $hydrator;

    public function __construct($doctrine_entity)
    {
        $this->hydrator = new ClassMethodsHydrator();
        $this->hydrator->hydrate($this->hydrator->extract($doctrine_entity), $this);
    }

    protected function getJsonValueFromDoctrineCollection($collection, $item_type)
    {
        $data = array();
        foreach ($collection as $item) {
            $data[] = $this->hydrator->extract(new $item_type($item));
        }

        return $data;
    }
}