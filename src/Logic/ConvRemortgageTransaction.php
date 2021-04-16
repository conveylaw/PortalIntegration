<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvRemortgageTransaction extends ConvTransaction
{
    /**
     * @var bool
     */
    protected bool $transferOfEquity = false;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $officeCopiesReceived = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $redemptionStatementReceived = null;
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
    protected ?string $signedMortgageDeedReceived = null;
    /**
     * @var string
     */
    protected static string $convApiObjectType = ConvApiObjectType::REMORTGAGE_TRANSACTION;

    public function jsonSerialize(): array
    {
        $result = parent::jsonSerialize();
        $this->testAndRemove($result, [
            "officeCopiesReceived",
            "redemptionStatementReceived",
            "mortgageOfferReceived",
            "signedMortgageDeedReceived"
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
     * @return bool
     */
    public function isTransferOfEquity(): bool
    {
        return $this->transferOfEquity;
    }

    /**
     * @param bool $transferOfEquity
     */
    public function setTransferOfEquity(bool $transferOfEquity): void
    {
        $this->transferOfEquity = $transferOfEquity;
    }

    /**
     * @return string|null
     */
    public function getOfficeCopiesReceived(): ?string
    {
        return $this->officeCopiesReceived;
    }

    /**
     * @param string|null $officeCopiesReceived
     */
    public function setOfficeCopiesReceived(?string $officeCopiesReceived): void
    {
        $this->officeCopiesReceived = $officeCopiesReceived;
    }

    /**
     * @return string|null
     */
    public function getRedemptionStatementReceived(): ?string
    {
        return $this->redemptionStatementReceived;
    }

    /**
     * @param string|null $redemptionStatementReceived
     */
    public function setRedemptionStatementReceived(?string $redemptionStatementReceived): void
    {
        $this->redemptionStatementReceived = $redemptionStatementReceived;
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
    public function getSignedMortgageDeedReceived(): ?string
    {
        return $this->signedMortgageDeedReceived;
    }

    /**
     * @param string|null $signedMortgageDeedReceived
     */
    public function setSignedMortgageDeedReceived(?string $signedMortgageDeedReceived): void
    {
        $this->signedMortgageDeedReceived = $signedMortgageDeedReceived;
    }
}
