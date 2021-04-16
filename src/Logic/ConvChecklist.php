<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvChecklist extends AbstractBaseJsonSerializable implements ConvApiObject
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
     * See ConvTransactionType
     *
     * @var string
     */
    protected string $transactionType = ConvTransactionType::SALE;
    /**
     * See ConvChecklistType
     *
     * @var string
     */
    protected string $checklistType = ConvChecklistType::EXCHANGE;
    /**
     * Date Time
     *
     * @var ?string
     */
    protected ?string $confirmed = null;
    /**
     * Date Time
     *
     * @var ?string
     */
    protected ?string $rejected = null;
    /**
     * Date Time
     *
     * @var ?string
     */
    protected ?string $approved = null;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::CHECKLIST;

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
    public function fromJson($jsonValue): ConvChecklist
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if ((property_exists($this, $key)) && ($key != "convApiObjectType")) {
                    $this->{$key} = $value;
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
     * @return string
     */
    public function getChecklistType(): string
    {
        return $this->checklistType;
    }

    /**
     * @param string $checklistType
     */
    public function setChecklistType(string $checklistType): void
    {
        $this->checklistType = $checklistType;
    }

    /**
     * @return string|null
     */
    public function getConfirmed(): ?string
    {
        return $this->confirmed;
    }

    /**
     * @param string|null $confirmed
     */
    public function setConfirmed(?string $confirmed): void
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return string|null
     */
    public function getRejected(): ?string
    {
        return $this->rejected;
    }

    /**
     * @param string|null $rejected
     */
    public function setRejected(?string $rejected): void
    {
        $this->rejected = $rejected;
    }

    /**
     * @return string|null
     */
    public function getApproved(): ?string
    {
        return $this->approved;
    }

    /**
     * @param string|null $approved
     */
    public function setApproved(?string $approved): void
    {
        $this->approved = $approved;
    }
}
