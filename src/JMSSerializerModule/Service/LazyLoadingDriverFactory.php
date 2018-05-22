<?php

namespace JMSSerializerModule\Service;

use JMSSerializerModule\Metadata\Driver\LazyLoadingDriver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class LazyLoadingDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class LazyLoadingDriverFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return LazyLoadingDriver
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new LazyLoadingDriver($serviceLocator, 'jms_serializer.metadata_driver');
    }
}