<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use InvalidArgumentException;
use JMS\Serializer\Builder\DefaultDriverFactory;
use JMS\Serializer\ContextFactory\CallableSerializationContextFactory;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Expression\ExpressionEvaluator;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\VisitorInterface;

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
        //$options = $this->getOptions($container, 'visitors');

        $builder = new SerializerBuilder();

//        $builder->configureHandlers(function(\JMS\Serializer\Handler\HandlerRegistry $registry) use ($container) {
//            $registry->registerSubscribingHandler($container->get('jms_serializer.handler_registry'));
//        });
        $builder->setSerializationVisitor('json', new \JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory());
        $builder->setDeserializationVisitor('json', new \JMS\Serializer\Visitor\Factory\JsonDeserializationVisitorFactory());
        //$builder->setExpressionEvaluator(new ExpressionEvaluator(new ExpressionLanguage()));
        $namingStrategy = new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy());
        $builder->setPropertyNamingStrategy($namingStrategy);
        $builder->setMetadataDriverFactory(new DefaultDriverFactory($namingStrategy));
        $builder->setSerializationContextFactory(
            new CallableSerializationContextFactory(static function () {
                $context = SerializationContext::create();
                $context->enableMaxDepthChecks();

                return $context;
            })
        );

        return $builder->build();

        /*$navigatorFactories = [
            GraphNavigatorInterface::DIRECTION_SERIALIZATION => $this->getSerializationNavigatorFactory($metadataFactory),
            GraphNavigatorInterface::DIRECTION_DESERIALIZATION => $this->getDeserializationNavigatorFactory($metadataFactory),
        ];

        return new Serializer(
            $container->get('jms_serializer.metadata_factory'),
            [],
            //$container->get('jms_serializer.handler_registry'),
            //$container->get('jms_serializer.object_constructor'),
            $options->getSerialization(),
            $options->getDeserialization(),
            //$container->get('jms_serializer.event_dispatcher')
        );*/
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionsClass(): string
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
