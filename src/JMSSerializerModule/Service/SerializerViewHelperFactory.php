<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMSSerializerModule\View\Serializer;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SerializerViewHelperFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class SerializerViewHelperFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Serializer($container->get('jms_serializer.serializer'));
    }
}
