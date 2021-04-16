<?php
namespace conveylaw\PortalIntegration\Logic;

class ConvPurchaseTransaction extends ConvTransaction {
    /**
     * @var bool
     */
    protected bool $mortgage = false;
    /**
     * @var bool
     */
    protected bool $firstTimeBuyer = false;
    /**
     * @var bool
     */
    protected bool $higherSdltRate = false;
    /**
     * See ConvTaxRegionType
     *
     * @var string
     */
    protected string $taxRegion = ConvTaxRegionType::NOT_KNOWN;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $memorandumReceived = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $enquiriesRaised = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $contractReceived = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $reportOnTitleCompleted = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $searchesRequested = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $mortgageOfferReceived = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $searchResultsReceived = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $projectedExchange = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $exchanged = null;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::PURCHASE_TRANSACTION;

    public function jsonSerialize(): array
    {
        $result = parent::jsonSerialize();
        $this->testAndRemove($result, [
            "memorandumReceived",
            "enquiriesRaised",
            "contractReceived",
            "reportOnTitleCompleted",
            "searchesRequested",
            "mortgageOfferReceived",
            "searchResultsReceived",
            "projectedExchange",
            "exchanged"
        ]);
        return $result;
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
    public function fromJson($jsonValue): ConvPurchaseTransaction
    {
        parent::fromJson($jsonValue);
        return $this;
    }

    /**
     * @return bool
     */
    public function isMortgage(): bool
    {
        return $this->mortgage;
    }

    /**
     * @param bool $mortgage
     */
    public function setMortgage(bool $mortgage): void
    {
        $this->mortgage = $mortgage;
    }

    /**
     * @return bool
     */
    public function isFirstTimeBuyer(): bool
    {
        return $this->firstTimeBuyer;
    }

    /**
     * @param bool $firstTimeBuyer
     */
    public function setFirstTimeBuyer(bool $firstTimeBuyer): void
    {
        $this->firstTimeBuyer = $firstTimeBuyer;
    }

    /**
     * @return bool
     */
    public function isHigherSdltRate(): bool
    {
        return $this->higherSdltRate;
    }

    /**
     * @param bool $higherSdltRate
     */
    public function setHigherSdltRate(bool $higherSdltRate): void
    {
        $this->higherSdltRate = $higherSdltRate;
    }

    /**
     * @return string
     */
    public function getTaxRegion(): string
    {
        return $this->taxRegion;
    }

    /**
     * @param string $taxRegion
     */
    public function setTaxRegion(string $taxRegion): void
    {
        $this->taxRegion = $taxRegion;
    }

    /**
     * @return string|null
     */
    public function getMemorandumReceived(): ?string
    {
        return $this->memorandumReceived;
    }

    /**
     * @param string|null $memorandumReceived
     */
    public function setMemorandumReceived(?string $memorandumReceived): void
    {
        $this->memorandumReceived = $memorandumReceived;
    }

    /**
     * @return string|null
     */
    public function getEnquiriesRaised(): ?string
    {
        return $this->enquiriesRaised;
    }

    /**
     * @param string|null $enquiriesRaised
     */
    public function setEnquiriesRaised(?string $enquiriesRaised): void
    {
        $this->enquiriesRaised = $enquiriesRaised;
    }

    /**
     * @return string|null
     */
    public function getContractReceived(): ?string
    {
        return $this->contractReceived;
    }

    /**
     * @param string|null $contractReceived
     */
    public function setContractReceived(?string $contractReceived): void
    {
        $this->contractReceived = $contractReceived;
    }

    /**
     * @return string|null
     */
    public function getReportOnTitleCompleted(): ?string
    {
        return $this->reportOnTitleCompleted;
    }

    /**
     * @param string|null $reportOnTitleCompleted
     */
    public function setReportOnTitleCompleted(?string $reportOnTitleCompleted): void
    {
        $this->reportOnTitleCompleted = $reportOnTitleCompleted;
    }

    /**
     * @return string|null
     */
    public function getSearchesRequested(): ?string
    {
        return $this->searchesRequested;
    }

    /**
     * @param string|null $searchesRequested
     */
    public function setSearchesRequested(?string $searchesRequested): void
    {
        $this->searchesRequested = $searchesRequested;
    }

    /**
     * @return string|null
     */
    public function getMortgageOfferReceived(): ?string
    {
        return $this->mortgageOfferReceived;
    }

    /**
     * @param string|null $mortgageOfferReceived
     */
    public function setMortgageOfferReceived(?string $mortgageOfferReceived): void
    {
        $this->mortgageOfferReceived = $mortgageOfferReceived;
    }

    /**
     * @return string|null
     */
    public function getSearchResultsReceived(): ?string
    {
        return $this->searchResultsReceived;
    }

    /**
     * @param string|null $searchResultsReceived
     */
    public function setSearchResultsReceived(?string $searchResultsReceived): void
    {
        $this->searchResultsReceived = $searchResultsReceived;
    }

    /**
     * @return string|null
     */
    public function getProjectedExchange(): ?string
    {
        return $this->projectedExchange;
    }

    /**
     * @param string|null $projectedExchange
     */
    public function setProjectedExchange(?string $projectedExchange): void
    {
        $this->projectedExchange = $projectedExchange;
    }

    /**
     * @return string|null
     */
    public function getExchanged(): ?string
    {
        return $this->exchanged;
    }

    /**
     * @param string|null $exchanged
     */
    public function setExchanged(?string $exchanged): void
    {
        $this->exchanged = $exchanged;
    }

}
