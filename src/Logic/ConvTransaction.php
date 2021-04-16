<?php

namespace conveylaw\PortalIntegration\Logic;

abstract class ConvTransaction extends AbstractBaseJsonSerializable implements ConvApiObject
{
    /**
     * @var ?string
     */
    protected ?string $matterReference = null;
    /**
     * Date Time
     *
     * @var ?string
     */
    protected ?string $lastUpdated = null;
    /**
     * @var ?string
     */
    protected ?string $conveyancerReference = null;
    /**
     * @var ?string
     */
    protected ?string $olcmsReference = null;
    /**
     * @var ?ConvContact
     */
    protected ?ConvContact $conveyancer = null;
    /**
     * @var ?string
     */
    protected ?string $introducerReference = null;
    /**
     * @var ?ConvContact
     */
    protected ?ConvContact $introducer = null;
    /**
     * @var float
     */
    protected float $amount = 0;
    /**
     * See ConvTenureType
     *
     * @var string
     */
    protected string $tenure = ConvTenureType::FREEHOLD;
    /**
     * @var ConvAddress
     */
    protected ConvAddress $address;
    /**
     * @var ?ConvAgent
     */
    protected ?ConvAgent $agent;
    /**
     * Optional - don't present if null
     *
     * @var ?bool
     */
    protected ?bool $onlineWelcomePack = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $intoAbeyance = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $outOfAbeyance = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $welcomePackSent = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $welcomePackHardCopyRequested = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $welcomePackReceived = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $welcomePackProcessed = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $clientIdReceived = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $clientIdVerified = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $projectedCompletion = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $completed = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $aborted = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?string
     */
    protected ?string $abortReason = null;
    /**
     * Date - Optional - don't present if null
     *
     * @var ?float
     */
    protected ?float $approvalFee = null;

    public function __construct()
    {
        $this->address = new ConvAddress();
    }

    public function jsonSerialize(): array
    {
        $result = parent::jsonSerialize();
        $this->testAndRemove($result,
            ["onlineWelcomePack",
                "intoAbeyance",
                "outOfAbeyance",
                "welcomePackSent",
                "welcomePackHardCopyRequested",
                "welcomePackReceived",
                "welcomePackProcessed",
                "clientIdReceived",
                "clientIdVerified",
                "projectedCompletion",
                "completed",
                "aborted",
                "abortReason",
                "approvalFee"]);
        $result["convApiObjectType"] = $this->getConvApiObjectType();
        return $result;
    }

    protected function testAndRemove(&$array, $keys)
    {
        if (is_string($keys)) {
            testAndRemove($array, [$keys]);
        } else if (is_array($keys)) {
            foreach ($keys as $key) {
                if ((property_exists($this, $key)) && (is_null($this->{$key}))) {
                    unset($array[$key]);
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     *
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvTransaction
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if ((property_exists($this, $key)) && ($key != "convApiObjectType")) {
                    if ($key == "address") {
                        $this->address = new ConvAddress();
                        $this->address->fromJson($value);
                    } else if ($key == "conveyancer") {
                        $this->conveyancer = new ConvContact();
                        $this->conveyancer->fromJson($value);
                    } else if ($key == "introducer") {
                        $this->introducer = new ConvContact();
                        $this->introducer->fromJson($value);
                    } else if ($key == "agent") {
                        $this->agent = new ConvAgent();
                        $this->agent->fromJson($value);
                    } else {
                        $this->{$key} = $value;
                    }
                }
            }
        }
        return $this;
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
    public function getLastUpdated(): ?string
    {
        return $this->lastUpdated;
    }

    /**
     * @param string|null $lastUpdated
     */
    public function setLastUpdated(?string $lastUpdated): void
    {
        $this->lastUpdated = $lastUpdated;
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
    public function getOlcmsReference(): ?string
    {
        return $this->olcmsReference;
    }

    /**
     * @param string|null $olcmsReference
     */
    public function setOlcmsReference(?string $olcmsReference): void
    {
        $this->olcmsReference = $olcmsReference;
    }

    /**
     * @return ConvContact|null
     */
    public function getConveyancer(): ?ConvContact
    {
        return $this->conveyancer;
    }

    /**
     * @param ConvContact|null $conveyancer
     */
    public function setConveyancer(?ConvContact $conveyancer): void
    {
        $this->conveyancer = $conveyancer;
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
     * @return ConvContact|null
     */
    public function getIntroducer(): ?ConvContact
    {
        return $this->introducer;
    }

    /**
     * @param ConvContact|null $introducer
     */
    public function setIntroducer(?ConvContact $introducer): void
    {
        $this->introducer = $introducer;
    }

    /**
     * @return float|null
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getTenure(): string
    {
        return $this->tenure;
    }

    /**
     * @param string $tenure
     */
    public function setTenure(string $tenure): void
    {
        $this->tenure = $tenure;
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
     * @return ConvAgent|null
     */
    public function getAgent(): ?ConvAgent
    {
        return $this->agent;
    }

    /**
     * @param ConvAgent|null $agent
     */
    public function setAgent(?ConvAgent $agent): void
    {
        $this->agent = $agent;
    }

    /**
     * @return bool|null
     */
    public function getOnlineWelcomePack(): ?bool
    {
        return $this->onlineWelcomePack;
    }

    /**
     * @param bool|null $onlineWelcomePack
     */
    public function setOnlineWelcomePack(?bool $onlineWelcomePack): void
    {
        $this->onlineWelcomePack = $onlineWelcomePack;
    }

    /**
     * @return string|null
     */
    public function getIntoAbeyance(): ?string
    {
        return $this->intoAbeyance;
    }

    /**
     * @param string|null $intoAbeyance
     */
    public function setIntoAbeyance(?string $intoAbeyance): void
    {
        $this->intoAbeyance = $intoAbeyance;
    }

    /**
     * @return string|null
     */
    public function getOutOfAbeyance(): ?string
    {
        return $this->outOfAbeyance;
    }

    /**
     * @param string|null $outOfAbeyance
     */
    public function setOutOfAbeyance(?string $outOfAbeyance): void
    {
        $this->outOfAbeyance = $outOfAbeyance;
    }

    /**
     * @return string|null
     */
    public function getWelcomePackSent(): ?string
    {
        return $this->welcomePackSent;
    }

    /**
     * @param string|null $welcomePackSent
     */
    public function setWelcomePackSent(?string $welcomePackSent): void
    {
        $this->welcomePackSent = $welcomePackSent;
    }

    /**
     * @return string|null
     */
    public function getWelcomePackHardCopyRequested(): ?string
    {
        return $this->welcomePackHardCopyRequested;
    }

    /**
     * @param string|null $welcomePackHardCopyRequested
     */
    public function setWelcomePackHardCopyRequested(?string $welcomePackHardCopyRequested): void
    {
        $this->welcomePackHardCopyRequested = $welcomePackHardCopyRequested;
    }

    /**
     * @return string|null
     */
    public function getWelcomePackReceived(): ?string
    {
        return $this->welcomePackReceived;
    }

    /**
     * @param string|null $welcomePackReceived
     */
    public function setWelcomePackReceived(?string $welcomePackReceived): void
    {
        $this->welcomePackReceived = $welcomePackReceived;
    }

    /**
     * @return string|null
     */
    public function getWelcomePackProcessed(): ?string
    {
        return $this->welcomePackProcessed;
    }

    /**
     * @param string|null $welcomePackProcessed
     */
    public function setWelcomePackProcessed(?string $welcomePackProcessed): void
    {
        $this->welcomePackProcessed = $welcomePackProcessed;
    }

    /**
     * @return string|null
     */
    public function getClientIdReceived(): ?string
    {
        return $this->clientIdReceived;
    }

    /**
     * @param string|null $clientIdReceived
     */
    public function setClientIdReceived(?string $clientIdReceived): void
    {
        $this->clientIdReceived = $clientIdReceived;
    }

    /**
     * @return string|null
     */
    public function getClientIdVerified(): ?string
    {
        return $this->clientIdVerified;
    }

    /**
     * @param string|null $clientIdVerified
     */
    public function setClientIdVerified(?string $clientIdVerified): void
    {
        $this->clientIdVerified = $clientIdVerified;
    }

    /**
     * @return string|null
     */
    public function getProjectedCompletion(): ?string
    {
        return $this->projectedCompletion;
    }

    /**
     * @param string|null $projectedCompletion
     */
    public function setProjectedCompletion(?string $projectedCompletion): void
    {
        $this->projectedCompletion = $projectedCompletion;
    }

    /**
     * @return string|null
     */
    public function getCompleted(): ?string
    {
        return $this->completed;
    }

    /**
     * @param string|null $completed
     */
    public function setCompleted(?string $completed): void
    {
        $this->completed = $completed;
    }

    /**
     * @return string|null
     */
    public function getAborted(): ?string
    {
        return $this->aborted;
    }

    /**
     * @param string|null $aborted
     */
    public function setAborted(?string $aborted): void
    {
        $this->aborted = $aborted;
    }

    /**
     * @return string|null
     */
    public function getAbortReason(): ?string
    {
        return $this->abortReason;
    }

    /**
     * @param string|null $abortReason
     */
    public function setAbortReason(?string $abortReason): void
    {
        $this->abortReason = $abortReason;
    }

    /**
     * @return float|null
     */
    public function getApprovalFee(): ?float
    {
        return $this->approvalFee;
    }

    /**
     * @param float|null $approvalFee
     */
    public function setApprovalFee(?float $approvalFee): void
    {
        $this->approvalFee = $approvalFee;
    }


}
