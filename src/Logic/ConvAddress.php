<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvAddress extends AbstractBaseJsonSerializable
{
    /**
     * @var ?string
     */
    protected ?string $property = null;
    /**
     * @var ?string
     */
    protected ?string $street = null;
    /**
     * @var ?string
     */
    protected ?string $town = null;
    /**
     * @var ?string
     */
    protected ?string $city = null;
    /**
     * @var ?string
     */
    protected ?string $county = null;
    /**
     * @var ?string
     */
    protected ?string $postcode = null;

    /**
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvAddress
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
    public function getProperty(): ?string
    {
        return $this->property;
    }

    /**
     * @param string|null $property
     */
    public function setProperty(?string $property): void
    {
        $this->property = $property;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getTown(): ?string
    {
        return $this->town;
    }

    /**
     * @param string|null $town
     */
    public function setTown(?string $town): void
    {
        $this->town = $town;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getCounty(): ?string
    {
        return $this->county;
    }

    /**
     * @param string|null $county
     */
    public function setCounty(?string $county): void
    {
        $this->county = $county;
    }

    /**
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param string|null $postcode
     */
    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
    }
}
