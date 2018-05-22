<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class CamelCaseNamingStrategyFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class CamelCaseNamingStrategyFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return CamelCaseNamingStrategy
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Configuration');
        $propertyNaming = new PropertyNaming($options['jms_serializer']['property_naming']);
        return new CamelCaseNamingStrategy($propertyNaming->getSeparator(), $propertyNaming->getLowercase());
    }
}