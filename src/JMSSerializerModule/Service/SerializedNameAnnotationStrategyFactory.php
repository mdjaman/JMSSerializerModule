<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SerializedNameAnnotationStrategyFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class SerializedNameAnnotationStrategyFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get('Configuration');
        if (isset($options['jms_serializer']['naming_strategy'])) {
            if ($options['jms_serializer']['naming_strategy'] === 'identical') {
                return new SerializedNameAnnotationStrategy($container->get('jms_serializer.identical_naming_strategy'));
            }
        }
        return new SerializedNameAnnotationStrategy($container->get('jms_serializer.camel_case_naming_strategy'));
    }
}
