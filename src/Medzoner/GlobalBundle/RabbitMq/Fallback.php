<?php

namespace Medzoner\GlobalBundle\RabbitMq;

use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

class Fallback implements ProducerInterface
{
    public $messages = [];

    public function publish($msgBody, $routingKey = '', $additionalProperties = [])
    {
        $message = [
            'body' => $msgBody,
            'routing_key' => $routingKey,
            'additional_properties' => $additionalProperties
        ];
        $this->messages[] = $message;
        return false;
    }
}
