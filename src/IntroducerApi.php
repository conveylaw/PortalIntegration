<?php

namespace conveylaw\PortalIntegration;

use conveylaw\PortalIntegration\Logic\ApiException;
use conveylaw\PortalIntegration\Logic\ConvApiExport;
use conveylaw\PortalIntegration\Logic\ConvApiImport;
use conveylaw\PortalIntegration\Logic\ConvApiImportResult;
use conveylaw\PortalIntegration\Logic\HttpStatusCodes;

class IntroducerApi
{
    private static ?IntroducerApi $instance = null;
    private IntroducerApiOptions $options;
    protected $curl;

    private function __construct(IntroducerApiOptions $options)
    {
        $this->options = $options;
        $this->curl = curl_init();
    }

    public static function getInstance(IntroducerApiOptions $options): IntroducerApi
    {
        if (is_null(self::$instance)) {
            self::$instance = new IntroducerApi($options);
        }
        return self::$instance;
    }

    /**
     * Call method
     *
     * @param string $method
     * @param string $action
     * @param array|null $data
     *
     * @return mixed
     * @throws ApiException
     */
    public function call(string $method, string $action = "GET", $data = null)
    {
        print_r($this->options->generatePath($method));
        $options = [
            CURLOPT_URL => $this->options->generatePath($method),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Content-Type: application/json'
            ],
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => "api:" . $this->options->getApiKey()
        ];

        if ($action == "POST") {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }

        if (!empty($this->customCurlOptions) && is_array($this->customCurlOptions)) {
            $options = $this->customCurlOptions + $options;
        }

        $response = $this->jsonValidate($this->executeCurl($options));

        return $response;
    }

    /**
     * @param array $options
     * @return bool|string
     * @throws ApiException
     */
    protected function executeCurl(array $options)
    {
        curl_setopt_array($this->curl, $options);

        $result = curl_exec($this->curl);
        $this->curlValidate($this->curl, $result);
        if ($result === false) {
            throw new ApiException(curl_error($this->curl), curl_errno($this->curl));
        }

        return $result;
    }

    /**
     * Response validation
     *
     * @param resource $curl
     * @param string $response
     * @throws ApiException
     */
    protected function curlValidate($curl, $response = null)
    {
        $json = json_decode($response, true) ?: [];
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (($httpCode < 200) || ($httpCode >= 300)) {
            $errorDescription = array_key_exists('description', $json)
                ? $json['description'] : HttpStatusCodes::$codes[$httpCode];
            throw new ApiException($errorDescription, $httpCode);
        }
    }

    /**
     * JSON validation
     *
     * @param string $jsonString
     * @param boolean $asArray
     *
     * @return object|array
     * @throws ApiException
     */
    protected function jsonValidate($jsonString)
    {
        $json = json_decode($jsonString, true);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new ApiException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }

    /**
     * @param array $convApiObjectsArray
     * @return string
     * @throws ApiException
     */
    public function importCase($convApiObjectsArray): string
    {
        if (!is_null($convApiObjectsArray)) {
            $_import = new ConvApiImport();
            $_import->setImports($convApiObjectsArray);
            $result = new ConvApiImportResult();
            $result->fromJson($this->call('api/introducer/imports/matter.json', "POST", json_encode($_import)));
            return $result->getMatterReference();
        } else {
            throw new ApiException("matterDetailsArray must be an array of ConvApiObjects", 500);
        }
    }

    /**
     * @return ConvApiExport
     * @throws ApiException
     */
    public function listInstructedCases(): ConvApiExport
    {
        $result = new ConvApiExport();
        $result->fromJson($this->call('api/introducer/exports/instructed.json'));
        return $result;
    }

    /**
     * @return ConvApiExport
     * @throws ApiException
     */
    public function listCaseUpdates(): ConvApiExport
    {
        $result = new ConvApiExport();
        $result->fromJson($this->call('api/introducer/exports/updates.json'));
        return $result;
    }

    /**
     * @param int $exportId
     * @throws ApiException
     */
    public function confirmExport(int $exportId): void
    {
        $this->call('api/introducer/exports/' . $exportId . '/confirm.json', "POST");
    }
}
