<?php

namespace conveylaw\PortalIntegration;

class IntroducerApiOptions
{
    /**
     * @var string
     */
    protected string $apiKey;
    /**
     * @var bool
     */
    protected bool $ssl;
    /**
     * @var string
     */
    protected string $hostname = "portal-ned.convey365.com";
    /**
     * @var int
     */
    protected int $port = 443;
    /**
     * @var string
     */
    protected string $basePath = "/";

    public function __construct($apiKey, $hostname = "portal.convey365.com", $basePath = "/", $port = 443, $ssl = true)
    {
        $this->apiKey = $apiKey;
        $this->ssl = $ssl;
        $this->hostname = $hostname;
        $this->port = $port;
        $this->basePath = $basePath;
    }

    public function generatePath(string $apiMethod): string
    {
        return "http" . ($this->ssl ? "s" : "") . "://" .
            $this->hostname . ":" . $this->port . $this->basePath . $apiMethod;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return bool
     */
    public function isSsl(): bool
    {
        return $this->ssl;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }
}
