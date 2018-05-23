<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use InvalidArgumentException;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Handler\SubscribingHandlerInterface;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class HandlerRegistryFactory extends AbstractFactory
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return HandlerRegistry
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $options \JMSSerializerModule\Options\Handlers */
        $options      = $this->getOptions($container, 'handlers');
        $handlerRegistry = new HandlerRegistry();

        foreach ($options->getSubscribers() as $subscriberName) {
            $subscriber = $subscriberName;
            if (is_string($subscriber)) {
                if ($container->has($subscriber)) {
                    $subscriber = $container->get($subscriber);
                } elseif (class_exists($subscriber)) {
                    $subscriber = new $subscriber();
                }
            }

            if ($subscriber instanceof SubscribingHandlerInterface) {
                $handlerRegistry->registerSubscribingHandler($subscriber);
                continue;
            }
            throw new InvalidArgumentException(sprintf(
                'Invalid subscriber "%s" given, must be a service name, '
                    . 'class name or an instance implementing JMS\Serializer\Handler\SubscribingHandlerInterface;',
                is_object($subscriberName)
                    ? get_class($subscriberName)
                    : (is_string($subscriberName) ? $subscriberName : gettype($subscriber))
            ));
        }

        return $handlerRegistry;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionsClass()
    {
        return 'JMSSerializerModule\Options\Handlers';
    }
}
