<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvClient extends AbstractBaseJsonSerializable implements ConvApiObject
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
     * @var ?string
     */
    protected ?string $title = null;
    /**
     * @var ?string
     */
    protected ?string $forename = null;
    /**
     * @var ?string
     */
    protected ?string $middlenames = null;
    /**
     * @var ?string
     */
    protected ?string $surname = null;
    /**
     * @var ?string
     */
    protected ?string $email = null;
    /**
     * @var ?string
     */
    protected ?string $telephone = null;
    /**
     * @var ?string
     */
    protected ?string $mobile = null;
    /**
     * @var ConvAddress
     */
    protected ConvAddress $address;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::CLIENT;

    /**
     * ConvClient constructor.
     */
    public function __construct()
    {
        $this->address = new ConvAddress();
    }

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
    public function fromJson($jsonValue): ConvClient
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if ((property_exists($this, $key)) && ($key != "convApiObjectType")) {
                    if ($key == "address") {
                        $this->address = new ConvAddress();
                        $this->address->fromJson($value);
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
     * @return int|null
     */
    public function getPortalId(): ?int
    {
        return $this->portalId;
    }

    /**
     * @param int|null $portalId
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getForename(): ?string
    {
        return $this->forename;
    }

    /**
     * @param string|null $forename
     */
    public function setForename(?string $forename): void
    {
        $this->forename = $forename;
    }

    /**
     * @return string|null
     */
    public function getMiddlenames(): ?string
    {
        return $this->middlenames;
    }

    /**
     * @param string|null $middlenames
     */
    public function setMiddlenames(?string $middlenames): void
    {
        $this->middlenames = $middlenames;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string|null $telephone
     */
    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     */
    public function setMobile(?string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return ConvAddress
     */
    public function getAddress(): ConvAddress
    {
        return $this->address;
    }

    /**
     * @param ConvAddress $address
     */
    public function setAddress(ConvAddress $address): void
    {
        $this->address = $address;
    }
}
