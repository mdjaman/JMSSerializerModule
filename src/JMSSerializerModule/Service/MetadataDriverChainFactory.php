<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use Metadata\Driver\DriverChain;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MetadataDriverChainFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataDriverChainFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DriverChain
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $annotationDriver = $container->get('jms_serializer.metadata.annotation_driver');
        $phpDriver = $container->get('jms_serializer.metadata.php_driver');
        $xmlDriver = $container->get('jms_serializer.metadata.xml_driver');
        $yamlDriver = $container->get('jms_serializer.metadata.yaml_driver');
        $driverChain = array($yamlDriver, $xmlDriver, $phpDriver, $annotationDriver);
        return new DriverChain($driverChain);
    }
}