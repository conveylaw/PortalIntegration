<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvSaleTransaction extends ConvTransaction {
    /**
     * @var bool
     */
    protected bool $mortgage = false;
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
    protected ?string $memorandumReceived = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $contractSentToOtherside = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $contractSentToClient = null;
    /**
     * Date - Optional - not presented if null
     *
     * @var ?string
     */
    protected ?string $contractReceivedFromClient = null;
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
    protected static string $convApiObjectType = ConvApiObjectType::SALE_TRANSACTION;

    public function jsonSerialize(): array
    {
        $result = parent::jsonSerialize();
        $this->testAndRemove($result, [
            "memorandumReceived",
            "officeCopiesReceived",
            "contractSentToOtherside",
            "contractSentToClient",
            "contractReceivedFromClient",
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
    public function getContractSentToOtherside(): ?string
    {
        return $this->contractSentToOtherside;
    }

    /**
     * @param string|null $contractSentToOtherside
     */
    public function setContractSentToOtherside(?string $contractSentToOtherside): void
    {
        $this->contractSentToOtherside = $contractSentToOtherside;
    }

    /**
     * @return string|null
     */
    public function getContractSentToClient(): ?string
    {
        return $this->contractSentToClient;
    }

    /**
     * @param string|null $contractSentToClient
     */
    public function setContractSentToClient(?string $contractSentToClient): void
    {
        $this->contractSentToClient = $contractSentToClient;
    }

    /**
     * @return string|null
     */
    public function getContractReceivedFromClient(): ?string
    {
        return $this->contractReceivedFromClient;
    }

    /**
     * @param string|null $contractReceivedFromClient
     */
    public function setContractReceivedFromClient(?string $contractReceivedFromClient): void
    {
        $this->contractReceivedFromClient = $contractReceivedFromClient;
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
