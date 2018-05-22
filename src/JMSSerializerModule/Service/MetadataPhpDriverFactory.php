<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\Metadata\Driver\PhpDriver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MetadataPhpDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataPhpDriverFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return void
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        new MetadataDriverFactory(PhpDriver::class);
    }
}