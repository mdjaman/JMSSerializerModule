<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use InvalidArgumentException;
use JMS\Serializer\Serializer;
use JMS\Serializer\VisitorInterface;
use PhpCollection\Map;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class SerializerFactory extends AbstractFactory
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $options \JMSSerializerModule\Options\Visitors */
        $options = $this->getOptions($container, 'visitors');

        return new Serializer(
            $container->get('jms_serializer.metadata_factory'),
            $container->get('jms_serializer.handler_registry'),
            $container->get('jms_serializer.object_constructor'),
            $this->buildMap($container, $options->getSerialization()),
            $this->buildMap($container, $options->getDeserialization()),
            $container->get('jms_serializer.event_dispatcher')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionsClass()
    {
        return 'JMSSerializerModule\Options\Visitors';
    }


    /**
     * @param ContainerInterface $container
     * @param array $array
     * @return Map
     * @throws \InvalidArgumentException
     */
    private function buildMap(ContainerInterface $container, array $array)
    {
        $map = new Map();
        foreach ($array as $format => $visitorName) {
            $visitor = $visitorName;
            if (is_string($visitorName)) {
                if ($container->has($visitorName)) {
                    $visitor = $container->get($visitorName);
                } elseif (class_exists($visitorName)) {
                    $visitor = new $visitorName();
                }
            }

            if ($visitor instanceof VisitorInterface) {
                $map->set($format, $visitor);
                continue;
            }

            throw new InvalidArgumentException(sprintf(
                'Invalid (de-)serialization visitor"%s" given, must be a service name, '
                    . 'class name or an instance implementing JMS\Serializer\VisitorInterface',
                is_object($visitorName)
                    ? get_class($visitorName)
                    : (is_string($visitorName) ? $visitorName : gettype($visitor))
            ));
        }

        return $map;
    }
}
