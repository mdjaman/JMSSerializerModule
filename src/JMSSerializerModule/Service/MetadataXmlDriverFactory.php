<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\Metadata\Driver\XmlDriver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MetadataXmlDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataXmlDriverFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return void
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        new MetadataDriverFactory(XmlDriver::class);
    }
}