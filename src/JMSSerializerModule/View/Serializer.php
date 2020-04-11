<?php

namespace JMSSerializerModule\View;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Zend\View\Helper\AbstractHelper;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class Serializer extends AbstractHelper
{
    /**
     * @var array
     */
    protected $allowedFormats = [
        'json',
        'yml',
        'xml',
    ];

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $object
     * @param string $format
     * @param SerializationContext|null $context
     * @return mixed|string
     */
    public function __invoke($object, $format = 'json', SerializationContext $context = null)
    {
        if (! in_array($format, $this->allowedFormats)) {
            $format = 'json';
        }

        return $this->serializer->serialize($object, $format, $context);
    }
}
