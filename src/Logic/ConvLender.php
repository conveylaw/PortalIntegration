<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvLender extends AbstractBaseJsonSerializable
{
    /**
     * See ConvLenderType
     *
     * @var string
     */
    protected string $type = ConvLenderType::REDEMPTION;
    /**
     * @var string
     */
    protected string $name = "";
    /**
     * @var ?string
     */
    protected ?string $panelNumber = null;
    /**
     * @var ConvAddress
     */
    protected ConvAddress $address;
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
    protected ?string $fax = null;
    /**
     * @var ?string
     */
    protected ?string $website = null;
    /**
     * @var bool
     */
    protected bool $lenderExchange = false;
    /**
     * @var ?string
     */
    protected ?string $link = null;
    /**
     * @var ?string
     */
    protected ?string $notes = null;

    /**
     * ConvLender constructor.
     */
    public function __construct()
    {
        $this->address = new ConvAddress();
    }

    /**
     * @param string|object|array $jsonValue
     */
    public function fromJson($jsonValue): ConvLender
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
    public function getPanelNumber(): ?string
    {
        return $this->panelNumber;
    }

    /**
     * @param string|null $panelNumber
     */
    public function setPanelNumber(?string $panelNumber): void
    {
        $this->panelNumber = $panelNumber;
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
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     */
    public function setFax(?string $fax): void
    {
        $this->fax = $fax;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return bool
     */
    public function isLenderExchange(): bool
    {
        return $this->lenderExchange;
    }

    /**
     * @param bool $lenderExchange
     */
    public function setLenderExchange(bool $lenderExchange): void
    {
        $this->lenderExchange = $lenderExchange;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

}
