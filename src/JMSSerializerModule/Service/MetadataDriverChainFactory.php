<?php

namespace JMSSerializerModule\Service;

use Metadata\Driver\DriverChain;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MetadataDriverChainFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataDriverChainFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return DriverChain
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $annotationDriver = $serviceLocator->get('jms_serializer.metadata.annotation_driver');
        $phpDriver = $serviceLocator->get('jms_serializer.metadata.php_driver');
        $xmlDriver = $serviceLocator->get('jms_serializer.metadata.xml_driver');
        $yamlDriver = $serviceLocator->get('jms_serializer.metadata.yaml_driver');
        return new DriverChain(array($yamlDriver, $xmlDriver, $phpDriver, $annotationDriver));
    }
}