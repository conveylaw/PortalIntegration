<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvApiExport extends AbstractBaseJsonSerializable
{
    /**
     * @var ?string
     */
    protected ?string $systemId = null;
    /**
     * @var ?int
     */
    protected ?int $exportId = null;
    /**
     * @var array
     */
    protected array $exports = [];

    /**
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvApiExport
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
                    if ($key == "exports") {
                        $this->exports = ConvApiObjectFactory::parseArrayOfConvApiObjects($value);
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
    public function getSystemId(): ?string
    {
        return $this->systemId;
    }

    /**
     * @param string|null $systemId
     */
    public function setSystemId(?string $systemId): void
    {
        $this->systemId = $systemId;
    }

    /**
     * @return int|null
     */
    public function getExportId(): ?int
    {
        return $this->exportId;
    }

    /**
     * @param int|null $exportId
     */
    public function setExportId(?int $exportId): void
    {
        $this->exportId = $exportId;
    }

    /**
     * @return array
     */
    public function getExports(): array
    {
        return $this->exports;
    }

    /**
     * @param array $exports
     */
    public function setExports(array $exports): void
    {
        $this->exports = $exports;
    }
}
