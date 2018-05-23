<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\YamlSerializationVisitor;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class YamlSerializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class YamlSerializationVisitorFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $namingStrategy = $container->get('jms_serializer.naming_strategy');
        return new YamlSerializationVisitor($namingStrategy);
    }
}
