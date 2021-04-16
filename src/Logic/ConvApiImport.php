<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvApiImport extends AbstractBaseJsonSerializable
{
    /**
     * @var ?string
     */
    protected ?string $systemId = null;
    /**
     * @var array
     */
    protected array $imports = [];

    /**
     * @param string|array|object $jsonValue
     */
    public function fromJson($jsonValue): ConvApiImport
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
                    if ($key == "imports") {
                        $this->imports = ConvApiObjectFactory::parseArrayOfConvApiObjects($value);
                    } else {
                        $this->{$key} = $value;
                    }
                }
            }
        }
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSystemId(): ?string
    {
        return $this->systemId;
    }

    /**
     * @param ?string $systemId
     */
    public function setSystemId(?string $systemId): void
    {
        $this->systemId = $systemId;
    }

    /**
     * @return array
     */
    public function getImports(): array
    {
        return $this->imports;
    }

    /**
     * @param array $imports
     */
    public function setImports(array $imports): void
    {
        $this->imports = $imports;
    }
}
