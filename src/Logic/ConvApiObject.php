<?php

namespace conveylaw\PortalIntegration\Logic;

interface ConvApiObject
{

    /**
     * See ConvApiObjectType
     *
     * @return string
     */
    public function getConvApiObjectType(): string;

    /**
     * @param string|object|array $jsonValue
     * @return void
     */
    public function fromJson($jsonValue): ConvApiObject;
}
