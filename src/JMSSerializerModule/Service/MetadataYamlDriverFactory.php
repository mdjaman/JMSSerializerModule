<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\Metadata\Driver\YamlDriver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MetadataYamlDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataYamlDriverFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return void
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        new MetadataDriverFactory(YamlDriver::class);
    }
}