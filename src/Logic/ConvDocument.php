<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvDocument extends AbstractBaseJsonSerializable implements ConvApiObject
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
     * @var ?string
     */
    protected ?string $documentUniqueIdentifier = null;
    /**
     * @var ?string
     */
    protected ?string $created = null;
    /**
     * @var ?string
     */
    protected ?string $name = null;
    /**
     * @var ?string
     */
    protected ?string $author = null;
    /**
     * @var ?string
     */
    protected ?string $mimeType = null;
    /**
     * @var ?string
     */
    protected ?string $accessUrl = null;
    /**
     * @var bool
     */
    protected bool $clientAccess = false;
    /**
     * @var bool
     */
    protected bool $introducerAccess = false;
    /**
     * @var bool
     */
    protected bool $conveyancerAccess = false;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::DOCUMENT;

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
    public function fromJson($jsonValue): ConvDocument
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
     * @return string|null
     */
    public function getDocumentUniqueIdentifier(): ?string
    {
        return $this->documentUniqueIdentifier;
    }

    /**
     * @param string|null $documentUniqueIdentifier
     */
    public function setDocumentUniqueIdentifier(?string $documentUniqueIdentifier): void
    {
        $this->documentUniqueIdentifier = $documentUniqueIdentifier;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param string|null $mimeType
     */
    public function setMimeType(?string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return string|null
     */
    public function getAccessUrl(): ?string
    {
        return $this->accessUrl;
    }

    /**
     * @param string|null $accessUrl
     */
    public function setAccessUrl(?string $accessUrl): void
    {
        $this->accessUrl = $accessUrl;
    }

    /**
     * @return bool
     */
    public function isClientAccess(): bool
    {
        return $this->clientAccess;
    }

    /**
     * @param bool $clientAccess
     */
    public function setClientAccess(bool $clientAccess): void
    {
        $this->clientAccess = $clientAccess;
    }

    /**
     * @return bool
     */
    public function isIntroducerAccess(): bool
    {
        return $this->introducerAccess;
    }

    /**
     * @param bool $introducerAccess
     */
    public function setIntroducerAccess(bool $introducerAccess): void
    {
        $this->introducerAccess = $introducerAccess;
    }

    /**
     * @return bool
     */
    public function isConveyancerAccess(): bool
    {
        return $this->conveyancerAccess;
    }

    /**
     * @param bool $conveyancerAccess
     */
    public function setConveyancerAccess(bool $conveyancerAccess): void
    {
        $this->conveyancerAccess = $conveyancerAccess;
    }

}
