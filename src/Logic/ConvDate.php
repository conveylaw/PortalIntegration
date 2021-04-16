<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvDate extends AbstractBaseJsonSerializable
{
    /**
     * Date Format: YYYY-MM-DD
     *
     * @var ?string
     */
    protected ?string $date = null;

    /**
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvDate
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
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }
}
