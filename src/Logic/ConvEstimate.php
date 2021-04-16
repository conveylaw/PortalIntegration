<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvEstimate extends AbstractBaseJsonSerializable implements ConvApiObject
{

    /**
     * @var ?string
     */
    protected ?string $matterReference = null;
    /**
     * @var ?string
     */
    protected ?string $conveyancerReference = null;
    /**
     * @var ?string
     */
    protected ?string $introducerReference = null;
    /**
     * @var string
     */
    protected string $reference = "";
    /**
     * @var ?string
     */
    protected ?string $created = null;
    /**
     * Array of ConvEstimateFee
     *
     * @var array
     */
    protected array $fees = [];
    /**
     * @var float
     */
    protected float $charge = 0;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::ESTIMATE;

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getConvApiObjectType(): string
    {
        return self::$convApiObjectType;
    }

    /**
     * {@inheritdoc}
     *
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvEstimate
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if ((property_exists($this, $key)) && ($key != "convApiObjectType")) {
                    if ($key == "fees") {
                        $this->fees = [];
                        foreach ($value as $feeValue) {
                            $fee = new ConvEstimateFee();
                            $fee->fromJson($feeValue);
                            array_push($this->fees, $fee);
                        }
                    } else {
                        $this->{$key} = $value;
                    }
                }
            }
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        $result = parent::jsonSerialize();
        $result["convApiObjectType"] = self::$convApiObjectType;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getMatterReference(): ?string
    {
        return $this->matterReference;
    }

    /**
     * @param string|null $matterReference
     */
    public function setMatterReference(?string $matterReference): void
    {
        $this->matterReference = $matterReference;
    }

    /**
     * @return string|null
     */
    public function getConveyancerReference(): ?string
    {
        return $this->conveyancerReference;
    }

    /**
     * @param string|null $conveyancerReference
     */
    public function setConveyancerReference(?string $conveyancerReference): void
    {
        $this->conveyancerReference = $conveyancerReference;
    }

    /**
     * @return string|null
     */
    public function getIntroducerReference(): ?string
    {
        return $this->introducerReference;
    }

    /**
     * @param string|null $introducerReference
     */
    public function setIntroducerReference(?string $introducerReference): void
    {
        $this->introducerReference = $introducerReference;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    /**
     * @return array
     */
    public function getFees(): array
    {
        return $this->fees;
    }

    /**
     * @param array $fees
     */
    public function setFees(array $fees): void
    {
        $this->fees = $fees;
    }

    /**
     * @return float
     */
    public function getCharge(): float
    {
        return $this->charge;
    }

    /**
     * @param float $charge
     */
    public function setCharge(float $charge): void
    {
        $this->charge = $charge;
    }
}
