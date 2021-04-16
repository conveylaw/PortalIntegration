<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvCaseStatus extends AbstractBaseJsonSerializable implements ConvApiObject
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
     * See ConvTransactionType
     *
     * @var string
     */
    protected string $transactionType = ConvTransactionType::SALE;
    /**
     * DateTime
     *
     * @var ?string
     */
    protected ?string $created = null;
    /**
     * @var string
     */
    protected string $author = "";
    /**
     * @var string
     */
    protected string $status = "";
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::CASE_STATUS;

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
    public function fromJson($jsonValue): ConvCaseStatus
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
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
     * @return ?string
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param ?string $created
     */
    public function setCreated(?string $created): void
    {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

}
