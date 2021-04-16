<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvEstimateFee extends AbstractBaseJsonSerializable
{

    /**
     * See ConvEstimateFeeType
     *
     * @var string
     */
    protected string $type = ConvEstimateFeeType::LEGAL_FEE;
    /**
     * @var string
     */
    protected string $name = "";
    /**
     * @var ?string
     */
    protected ?string $description = null;
    /**
     * @var float
     */
    protected float $value = 0;
    /**
     * @var float
     */
    protected float $vat = 0;
    /**
     * @var float
     */
    protected float $commission = 0;
    /**
     * See ConvTransactionType
     *
     * @var string
     */
    protected string $transactionType = ConvTransactionType::SALE;
    /**
     * @var bool
     */
    protected bool $legalFee = false;

    /**
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvEstimateFee
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }

    /**
     * @param float $vat
     */
    public function setVat(float $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @return float
     */
    public function getCommission(): float
    {
        return $this->commission;
    }

    /**
     * @param float $commission
     */
    public function setCommission(float $commission): void
    {
        $this->commission = $commission;
    }

    /**
     * @return string
     */
    public function getTransactionType(): string
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     */
    public function setTransactionType(string $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    /**
     * @return bool
     */
    public function isLegalFee(): bool
    {
        return $this->legalFee;
    }

    /**
     * @param bool $legalFee
     */
    public function setLegalFee(bool $legalFee): void
    {
        $this->legalFee = $legalFee;
    }
}
