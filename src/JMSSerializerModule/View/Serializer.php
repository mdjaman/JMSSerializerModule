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
     * @param string $type
     * @param SerializationContext|null $context
     * @return mixed|string
     */
    public function __invoke($object, $type = 'json', SerializationContext $context = null)
    {
        return $this->serializer->serialize($object, $type, $context);
    }
}
