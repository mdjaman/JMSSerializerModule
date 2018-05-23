<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class JsonDeserializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class JsonDeserializationVisitorFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return JsonDeserializationVisitor|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new JsonDeserializationVisitor(
            $container->get('jms_serializer.naming_strategy'),
            $container->get('jms_serializer.object_constructor')
        );
    }
}
