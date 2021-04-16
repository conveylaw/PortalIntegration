<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvFeedbackHolder extends AbstractBaseJsonSerializable
{
    /**
     * @var ConvContact
     */
    protected ConvContact $contact;
    /**
     * @var array
     */
    protected array $feedback = [];

    /**
     * ConvFeedbackHolder constructor.
     */
    public function __construct()
    {
        $this->contact = new ConvContact();
    }

    /**
     * @param string|object|array $jsonValue
     */
    public function fromJson($jsonValue): ConvFeedbackHolder
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
                    if ($key == "contact") {
                        $this->contact = new ConvContact();
                        $this->contact->fromJson($value);
                    } elseif ($key == "feedback") {
                        $this->feedback = [];
                        if (is_array($value)) {
                            foreach ($value as $innerKey => $innerValue) {
                                $feedback = new ConvFeedback();
                                $feedback->fromJson($value);
                                array_push($this->feedback, $feedback);
                            }
                        }
                    } else {
                        $this->{$key} = $value;
                    }
                }
            }
        }
        return $this;
    }

    /**
     * @return \conveylaw\PortalIntegration\Logic\ConvContact
     */
    public function getContact(): \conveylaw\PortalIntegration\Logic\ConvContact
    {
        return $this->contact;
    }

    /**
     * @param \conveylaw\PortalIntegration\Logic\ConvContact $contact
     */
    public function setContact(\conveylaw\PortalIntegration\Logic\ConvContact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return array
     */
    public function getFeedback(): array
    {
        return $this->feedback;
    }

    /**
     * @param array $feedback
     */
    public function setFeedback(array $feedback): void
    {
        $this->feedback = $feedback;
    }
}
