<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMSSerializerModule\Options\PropertyNaming;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CamelCaseNamingStrategyFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class CamelCaseNamingStrategyFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CamelCaseNamingStrategy|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get('Configuration');
        $propertyNaming = new PropertyNaming($options['jms_serializer']['property_naming']);
        return new CamelCaseNamingStrategy($propertyNaming->getSeparator(), $propertyNaming->getLowercase());
    }
}
