<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SerializedNameAnnotationStrategyFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class SerializedNameAnnotationStrategyFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return SerializedNameAnnotationStrategy
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Configuration');
        if (isset($options['jms_serializer']['naming_strategy'])) {
            if ($options['jms_serializer']['naming_strategy'] === 'identical') {
                return new SerializedNameAnnotationStrategy($serviceLocator->get('jms_serializer.identical_naming_strategy'));
            }
        }
        return new SerializedNameAnnotationStrategy($serviceLocator->get('jms_serializer.camel_case_naming_strategy'));
    }
}