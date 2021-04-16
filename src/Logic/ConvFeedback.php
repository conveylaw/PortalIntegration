<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvFeedback extends AbstractBaseJsonSerializable implements ConvApiObject
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
     * @var string
     */
    protected string $transactionType = ConvTransactionType::SALE;

    /**
     * @var ?string
     */
    protected ?string $clients = null;
    /**
     * @var ?string
     */
    protected ?string $property = null;

    /**
     * @var bool
     */
    protected bool $disabled = false;
    /**
     * Date Time
     *
     * @var ?string
     */
    protected ?string $completed = null;

    /**
     * @var ?string
     */
    protected ?string $comments = null;
    /**
     * @var ?string
     */
    protected ?string $staffName = null;
    /**
     * @var ?string
     */
    protected ?string $conveyancerComments = null;
    /**
     * @var bool
     */
    protected bool $consent = true;
    /**
     * @var ?int
     */
    protected ?int $firstImpressions = 0;
    /**
     * @var ?int
     */
    protected ?int $explainProcess = 0;
    /**
     * @var ?int
     */
    protected ?int $explainFees = 0;
    /**
     * @var ?int
     */
    protected ?int $explainTerminology = 0;
    /**
     * @var ?int
     */
    protected ?int $responsiveness = 0;
    /**
     * @var ?int
     */
    protected ?int $thirdPartyCommunication = 0;
    /**
     * @var ?int
     */
    protected ?int $legalProblems = 0;
    /**
     * @var ?int
     */
    protected ?int $deadlines = 0;
    /**
     * @var ?int
     */
    protected ?int $overallService = 0;
    /**
     * @var ?int
     */
    protected ?int $recommendation = 0;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::FEEDBACK;

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
    public function fromJson($jsonValue): ConvFeedback
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
    public function getClients(): ?string
    {
        return $this->clients;
    }

    /**
     * @param string|null $clients
     */
    public function setClients(?string $clients): void
    {
        $this->clients = $clients;
    }

    /**
     * @return string|null
     */
    public function getProperty(): ?string
    {
        return $this->property;
    }

    /**
     * @param string|null $property
     */
    public function setProperty(?string $property): void
    {
        $this->property = $property;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     */
    public function setDisabled(bool $disabled): void
    {
        $this->disabled = $disabled;
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
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * @param string|null $comments
     */
    public function setComments(?string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string|null
     */
    public function getStaffName(): ?string
    {
        return $this->staffName;
    }

    /**
     * @param string|null $staffName
     */
    public function setStaffName(?string $staffName): void
    {
        $this->staffName = $staffName;
    }

    /**
     * @return string|null
     */
    public function getConveyancerComments(): ?string
    {
        return $this->conveyancerComments;
    }

    /**
     * @param string|null $conveyancerComments
     */
    public function setConveyancerComments(?string $conveyancerComments): void
    {
        $this->conveyancerComments = $conveyancerComments;
    }

    /**
     * @return bool
     */
    public function isConsent(): bool
    {
        return $this->consent;
    }

    /**
     * @param bool $consent
     */
    public function setConsent(bool $consent): void
    {
        $this->consent = $consent;
    }

    /**
     * @return int|null
     */
    public function getFirstImpressions(): ?int
    {
        return $this->firstImpressions;
    }

    /**
     * @param int|null $firstImpressions
     */
    public function setFirstImpressions(?int $firstImpressions): void
    {
        $this->firstImpressions = $firstImpressions;
    }

    /**
     * @return int|null
     */
    public function getExplainProcess(): ?int
    {
        return $this->explainProcess;
    }

    /**
     * @param int|null $explainProcess
     */
    public function setExplainProcess(?int $explainProcess): void
    {
        $this->explainProcess = $explainProcess;
    }

    /**
     * @return int|null
     */
    public function getExplainFees(): ?int
    {
        return $this->explainFees;
    }

    /**
     * @param int|null $explainFees
     */
    public function setExplainFees(?int $explainFees): void
    {
        $this->explainFees = $explainFees;
    }

    /**
     * @return int|null
     */
    public function getExplainTerminology(): ?int
    {
        return $this->explainTerminology;
    }

    /**
     * @param int|null $explainTerminology
     */
    public function setExplainTerminology(?int $explainTerminology): void
    {
        $this->explainTerminology = $explainTerminology;
    }

    /**
     * @return int|null
     */
    public function getResponsiveness(): ?int
    {
        return $this->responsiveness;
    }

    /**
     * @param int|null $responsiveness
     */
    public function setResponsiveness(?int $responsiveness): void
    {
        $this->responsiveness = $responsiveness;
    }

    /**
     * @return int|null
     */
    public function getThirdPartyCommunication(): ?int
    {
        return $this->thirdPartyCommunication;
    }

    /**
     * @param int|null $thirdPartyCommunication
     */
    public function setThirdPartyCommunication(?int $thirdPartyCommunication): void
    {
        $this->thirdPartyCommunication = $thirdPartyCommunication;
    }

    /**
     * @return int|null
     */
    public function getLegalProblems(): ?int
    {
        return $this->legalProblems;
    }

    /**
     * @param int|null $legalProblems
     */
    public function setLegalProblems(?int $legalProblems): void
    {
        $this->legalProblems = $legalProblems;
    }

    /**
     * @return int|null
     */
    public function getDeadlines(): ?int
    {
        return $this->deadlines;
    }

    /**
     * @param int|null $deadlines
     */
    public function setDeadlines(?int $deadlines): void
    {
        $this->deadlines = $deadlines;
    }

    /**
     * @return int|null
     */
    public function getOverallService(): ?int
    {
        return $this->overallService;
    }

    /**
     * @param int|null $overallService
     */
    public function setOverallService(?int $overallService): void
    {
        $this->overallService = $overallService;
    }

    /**
     * @return int|null
     */
    public function getRecommendation(): ?int
    {
        return $this->recommendation;
    }

    /**
     * @param int|null $recommendation
     */
    public function setRecommendation(?int $recommendation): void
    {
        $this->recommendation = $recommendation;
    }

}
