<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMSSerializerModule\Metadata\Driver\LazyLoadingDriver;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LazyLoadingDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class LazyLoadingDriverFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return LazyLoadingDriver|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LazyLoadingDriver($container, 'jms_serializer.metadata_driver');
    }
}