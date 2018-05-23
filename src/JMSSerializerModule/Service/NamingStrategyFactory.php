<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Naming\CacheNamingStrategy;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class NamingStrategyFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $options \JMSSerializerModule\Options\PropertyNaming */
        $options = $this->getOptions($container, 'property_naming');
        /** @var $namingStrategy \JMS\Serializer\Naming\PropertyNamingStrategyInterface */
        $namingStrategy = $container->get('jms_serializer.serialized_name_annotation_strategy');
        if ($options->getEnableCache()) {
            $namingStrategy = new CacheNamingStrategy($namingStrategy);
        }

        return $namingStrategy;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionsClass()
    {
        return 'JMSSerializerModule\Options\PropertyNaming';
    }
}
