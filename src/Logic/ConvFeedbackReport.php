<?php

namespace conveylaw\PortalIntegration\Logic;
class ConvFeedbackReport extends AbstractBaseJsonSerializable
{
    /**
     * See ConvFeedbackReportType
     *
     * @var string
     */
    protected string $type = ConvFeedbackReportType::INTRODUCER;
    /**
     * Date Format
     *
     * @var ?string
     */
    protected ?string $start = null;
    /**
     * Date Format
     *
     * @var ?string
     */
    protected ?string $end = null;
    /**
     * @var array
     */
    protected array $feedback = [];

    /**
     * @param string|object|array $jsonValue
     */
    public function fromJson($jsonValue): ConvFeedbackReport
    {
        if (is_string($jsonValue)) {
            $this->fromJson(json_decode($jsonValue, true));
        } else if (is_object($jsonValue)) {
            $this->fromJson(get_object_vars($jsonValue));
        } else if (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (property_exists($this, $key)) {
                    if ($key == "feedback") {
                        $this->feedback = [];
                        if (is_array($value)) {
                            foreach ($value as $innerKey => $innerValue) {
                                $feedback = new ConvFeedbackHolder();
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getStart(): ?string
    {
        return $this->start;
    }

    /**
     * @param string|null $start
     */
    public function setStart(?string $start): void
    {
        $this->start = $start;
    }

    /**
     * @return string|null
     */
    public function getEnd(): ?string
    {
        return $this->end;
    }

    /**
     * @param string|null $end
     */
    public function setEnd(?string $end): void
    {
        $this->end = $end;
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
