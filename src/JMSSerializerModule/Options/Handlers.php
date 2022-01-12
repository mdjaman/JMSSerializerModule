<?php

namespace JMSSerializerModule\Options;

use Laminas\Stdlib\AbstractOptions;

/**
 * HandlerRegistry options
 *
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class Handlers extends AbstractOptions
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
        'jms_serializer.datetime_handler',
        'jms_serializer.array_collection_handler',
    ];

    /**
     * Contains option for the date handler.
     *
     * @var array
     */
    protected array $datetime = [];


    /**
     * @param $options
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        $this->datetime = [
            'default_format' => \DateTime::ISO8601,
            'default_timezone' => date_default_timezone_get(),
        ];
    }

    /**
     * @param array $subscribers
     * @return self
     */
    public function setSubscribers(array $subscribers): Handlers
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

    /**
     * @param array $datetime
     * @return self
     */
    public function setDatetime(array $datetime): Handlers
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * @return array
     */
    public function getDatetime(): array
    {
        return $this->datetime;
    }
}
