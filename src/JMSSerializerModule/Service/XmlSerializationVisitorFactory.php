<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\XmlSerializationVisitor;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class XmlSerializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class XmlSerializationVisitorFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new XmlSerializationVisitor($container->get('jms_serializer.naming_strategy'));
    }
}
