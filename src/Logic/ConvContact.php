<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvContact extends AbstractBaseJsonSerializable
{
    /**
     * @var ?int
     */
    protected ?int $id = null;
    /**
     * @var ?string
     */
    protected ?string $firmName = null;
    /**
     * @var ?string
     */
    protected ?string $branchName = null;
    /**
     * @var ?string
     */
    protected ?string $contactName = null;
    /**
     * @var ?string
     */
    protected ?string $telephone = null;
    /**
     * @var ?string
     */
    protected ?string $email = null;
    /**
     * @var ConvAddress
     */
    protected ConvAddress $address;

    /**
     * ConvContact constructor.
     */
    public function __construct()
    {
        $this->address = new ConvAddress();
    }

    /**
     * {@inheritdoc}
     *
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvContact
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getFirmName(): ?string
    {
        return $this->firmName;
    }

    /**
     * @param string|null $firmName
     */
    public function setFirmName(?string $firmName): void
    {
        $this->firmName = $firmName;
    }

    /**
     * @return string|null
     */
    public function getBranchName(): ?string
    {
        return $this->branchName;
    }

    /**
     * @param string|null $branchName
     */
    public function setBranchName(?string $branchName): void
    {
        $this->branchName = $branchName;
    }

    /**
     * @return string|null
     */
    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    /**
     * @param string|null $contactName
     */
    public function setContactName(?string $contactName): void
    {
        $this->contactName = $contactName;
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
