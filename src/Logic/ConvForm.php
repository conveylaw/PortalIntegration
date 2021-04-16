<?php

namespace conveylaw\PortalIntegration\Logic;
class ConvForm extends AbstractBaseJsonSerializable implements ConvApiObject
{
    /**
     * @var ?int
     */
    protected ?int $portalId = null;
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
     * @var ?int
     */
    protected ?int $formId = null;
    /**
     * See ConvFormType
     *
     * @var string
     */
    protected string $formType = ConvFormType::ID_DETAILS;
    /**
     * @var ?string
     */
    protected ?string $formName = null;
    /**
     * @var ?string
     */
    protected ?string $formJson = null;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::FORM;

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
    public function fromJson($jsonValue): ConvForm
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
     * @return ?int
     */
    public function getPortalId(): ?int
    {
        return $this->portalId;
    }

    /**
     * @param ?int $portalId
     */
    public function setPortalId(?int $portalId): void
    {
        $this->portalId = $portalId;
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
     * @return ?int
     */
    public function getFormId(): ?int
    {
        return $this->formId;
    }

    /**
     * @param ?int $formId
     */
    public function setFormId(?int $formId): void
    {
        $this->formId = $formId;
    }

    /**
     * @return string
     */
    public function getFormType(): string
    {
        return $this->formType;
    }

    /**
     * @param string $formType
     */
    public function setFormType(string $formType): void
    {
        $this->formType = $formType;
    }

    /**
     * @return string|null
     */
    public function getFormName(): ?string
    {
        return $this->formName;
    }

    /**
     * @param string|null $formName
     */
    public function setFormName(?string $formName): void
    {
        $this->formName = $formName;
    }

    /**
     * @return string|null
     */
    public function getFormJson(): ?string
    {
        return $this->formJson;
    }

    /**
     * @param string|null $formJson
     */
    public function setFormJson(?string $formJson): void
    {
        $this->formJson = $formJson;
    }

}
