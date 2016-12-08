<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/8
 * Time: 12:04
 */
namespace ApigilityCatworkFoundation\Base;

use ApigilityObjectStorage\Service\ObjectStorageService;
use Zend\ServiceManager\ServiceManager;

abstract class ApigilityObjectStorageAwareEntity extends ApigilityEntity
{
    /**
     * @var ObjectStorageService
     */
    protected $objectStorageService;

    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    public function __construct($doctrine_entity, ServiceManager $services)
    {
        parent::__construct($doctrine_entity);
        $this->serviceManager = $services;
        $this->objectStorageService = $services->get('ApigilityObjectStorage\Service\ObjectStorageService');
    }

    protected function renderUriToUrl($uri)
    {
        return $this->objectStorageService->renderUriToUrl($uri);
    }
}