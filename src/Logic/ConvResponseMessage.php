<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvResponseMessage extends AbstractBaseJsonSerializable
{
    /**
     * @var ?string
     */
    protected ?string $message = null;

    /**
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvResponseMessage
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }
}
