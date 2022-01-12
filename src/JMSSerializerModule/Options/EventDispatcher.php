<?php

namespace JMSSerializerModule\Options;

use Laminas\Stdlib\AbstractOptions;

/**
 * HandlerRegistry options
 *
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class EventDispatcher extends AbstractOptions
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * An array of subscribers. The array can contain the FQN of the
     * class to instantiate OR a string to be located with the
     * service locator.
     *
     * @var array
     */
    protected array $subscribers = [
        'jms_serializer.doctrine_proxy_subscriber',
    ];

    /**
     * @param  array $subscribers
     * @return self
     */
    public function setSubscribers(array $subscribers)
    {
        $this->subscribers = $subscribers;
        return $this;
    }

    /**
     * @return array
     */
    public function getSubscribers(): array
    {
        return $this->subscribers;
    }
}
