<?php

namespace conveylaw\PortalIntegration\Logic;

class ConvApiObjectFactory
{
    /**
     * @param string|object|array $jsonValue
     * @return array
     */
    public static function parseArrayOfConvApiObjects($jsonValue): array
    {
        $results = [];
        if (is_string($jsonValue)) {
            self::parseArrayOfConvApiObjects(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            self::parseArrayOfConvApiObjects(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                $type = self::extractConvApiObjectType($value);
                switch ($type) {
                    case ConvApiObjectType::ESTIMATE:
                        $estimate = new ConvEstimate();
                        $estimate->fromJson($value);
                        array_push($results, $estimate);
                        break;
                    case ConvApiObjectType::PURCHASE_TRANSACTION:
                        $purchaseTransaction = new ConvPurchaseTransaction();
                        $purchaseTransaction->fromJson($value);
                        array_push($results, $purchaseTransaction);
                        break;
                    case ConvApiObjectType::SALE_TRANSACTION:
                        $saleTransaction = new ConvSaleTransaction();
                        $saleTransaction->fromJson($value);
                        array_push($results, $saleTransaction);
                        break;
                    case ConvApiObjectType::REMORTGAGE_TRANSACTION:
                        $remortgageTransaction = new ConvRemortgageTransaction();
                        $remortgageTransaction->fromJson($value);
                        array_push($results, $remortgageTransaction);
                        break;
                    case ConvApiObjectType::CASE_STATUS:
                        $caseStatus = new ConvCaseStatus();
                        $caseStatus->fromJson($value);
                        array_push($results, $caseStatus);
                        break;
                    case ConvApiObjectType::CHECKLIST:
                        $checklist = new ConvChecklist();
                        $checklist->fromJson($value);
                        array_push($results, $checklist);
                        break;
                    case ConvApiObjectType::CLIENT:
                        $client = new ConvClient();
                        $client->fromJson($value);
                        array_push($results, $client);
                        break;
                    case ConvApiObjectType::DOCUMENT:
                        $document = new ConvDocument();
                        $document->fromJson($value);
                        array_push($results, $document);
                        break;
                    case ConvApiObjectType::NOTE:
                        $note = new ConvNote();
                        $note->fromJson($value);
                        array_push($results, $note);
                        break;
                    case ConvApiObjectType::FEEDBACK:
                        $feedback = new ConvFeedback();
                        $feedback->fromJson($value);
                        array_push($results, $feedback);
                        break;
                    case ConvApiObjectType::FORM:
                        $form = new ConvForm();
                        $form->fromJson($value);
                        array_push($results, $form);
                        break;
                    default:
                        break;
                }
            }
        }
        return $results;
    }

    /*
     * @param string|object|array $jsonValue
     */
    private static function extractConvApiObjectType($jsonValue): ?string
    {
        if (is_string($jsonValue)) {
            return self::extractConvApiObjectType(json_decode($jsonValue, true));
        } elseif (is_object($jsonValue)) {
            return self::extractConvApiObjectType(get_object_vars($jsonValue));
        } elseif (is_array($jsonValue)) {
            foreach ($jsonValue as $key => $value) {
                if (($key == "convApiObjectType") && (is_string($value))) {
                    return $value;
                }
            }
        }
        return null;
    }
}
