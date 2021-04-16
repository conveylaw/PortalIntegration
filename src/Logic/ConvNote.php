<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvNote extends AbstractBaseJsonSerializable implements ConvApiObject
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
     * @var ?string
     */
    protected ?string $transactionType = null;
    /**
     * Date Time
     *
     * @var ?string
     */
    protected ?string $created = null;
    /**
     * @var ?string
     */
    protected ?string $author = null;
    /**
     * @var ?string
     */
    protected ?string $note = null;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::NOTE;

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
    public function fromJson($jsonValue): ConvNote
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
     * @return string|null
     */
    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    /**
     * @param string|null $transactionType
     */
    public function setTransactionType(?string $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    /**
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string|null $created
     */
    public function setCreated(?string $created): void
    {
        $this->created = $created;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

}
