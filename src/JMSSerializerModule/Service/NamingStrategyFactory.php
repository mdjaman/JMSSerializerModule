<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class NamingStrategyFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     *
     * jms/serializer 3.x dropped CacheNamingStrategy: naming-strategy lookups
     * are a cheap per-property computation, not something that needed its
     * own cache layer even before. The `enable_cache` option is unused now.
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $namingStrategy PropertyNamingStrategyInterface */
        $namingStrategy = $container->get('jms_serializer.serialized_name_annotation_strategy');

        return $namingStrategy;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionsClass(): string
    {
        return 'JMSSerializerModule\Options\PropertyNaming';
    }
}
