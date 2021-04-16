<?php

namespace conveylaw\PortalIntegration\Logic;

use JsonSerializable;

abstract class AbstractBaseJsonSerializable implements JsonSerializable
{

    abstract public function fromJson($jsonValue): AbstractBaseJsonSerializable;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
