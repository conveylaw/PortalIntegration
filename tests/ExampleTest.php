<?php

declare(strict_types=1);

namespace conveylaw\PortalIntegration;

use conveylaw\PortalIntegration\Logic\ConvAddress;
use conveylaw\PortalIntegration\Logic\ConvAgent;
use conveylaw\PortalIntegration\Logic\ConvApiExport;
use conveylaw\PortalIntegration\Logic\ConvApiObjectFactory;
use conveylaw\PortalIntegration\Logic\ConvChecklist;
use conveylaw\PortalIntegration\Logic\ConvChecklistType;
use conveylaw\PortalIntegration\Logic\ConvClient;
use conveylaw\PortalIntegration\Logic\ConvContact;
use conveylaw\PortalIntegration\Logic\ConvDate;
use conveylaw\PortalIntegration\Logic\ConvDocument;
use conveylaw\PortalIntegration\Logic\ConvEstimate;
use conveylaw\PortalIntegration\Logic\ConvEstimateFee;
use conveylaw\PortalIntegration\Logic\ConvEstimateFeeType;
use conveylaw\PortalIntegration\Logic\ConvFeedback;
use conveylaw\PortalIntegration\Logic\ConvNote;
use conveylaw\PortalIntegration\Logic\ConvPurchaseTransaction;
use conveylaw\PortalIntegration\Logic\ConvRemortgageTransaction;
use conveylaw\PortalIntegration\Logic\ConvResponseMessage;
use conveylaw\PortalIntegration\Logic\ConvSaleTransaction;
use conveylaw\PortalIntegration\Logic\ConvTaxRegionType;
use conveylaw\PortalIntegration\Logic\ConvTenureType;
use conveylaw\PortalIntegration\Logic\ConvTransactionType;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @test
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }

    public function testConversionToFromJson()
    {
        $address = $this->mockConvAddress();
        $convertedAddress = new ConvAddress();
        $convertedAddress->fromJson(json_encode($address));
        $this->assertEquals($address, $convertedAddress);

        $agent = $this->mockConvAgent();
        $convertedAgent = new ConvAgent();
        $convertedAgent->fromJson(json_encode($agent));
        $this->assertEquals($agent, $convertedAgent);

        $client = $this->mockConvClient();
        $convertedClient = new ConvClient();
        $convertedClient->fromJson(json_encode($client));
        $this->assertEquals($client, $convertedClient);

        $contact = $this->mockConvContact();
        $convertedContact = new ConvContact();
        $convertedContact->fromJson(json_encode($contact));
        $this->assertEquals($contact, $convertedContact);

        $document = $this->mockConvDocument();
        $convertedDocument = new ConvDocument();
        $convertedDocument->fromJson(json_encode($document));
        $this->assertEquals($document, $convertedDocument);

        $estimate = $this->mockConvEstimate();
        $cEstimate = new ConvEstimate();
        $cEstimate->fromJson(json_encode($estimate));
        $this->assertEquals($estimate, $cEstimate);

        $feedback = $this->mockConvFeedback();
        $cFeedback = new ConvFeedback();
        $cFeedback->fromJson(json_encode($feedback));
        $this->assertEquals($feedback, $cFeedback);

        $note = $this->mockConvNote();
        $cNote = new ConvNote();
        $cNote->fromJson(json_encode($note));
        $this->assertEquals($note, $cNote);

        $pt = $this->mockConvPurchaseTransaction();
        $cpt = new ConvPurchaseTransaction();
        $cpt->fromJson(json_encode($pt));
        $this->assertEquals($pt, $cpt);

        $st = $this->mockConvSaleTransaction();
        $cst = new ConvSaleTransaction();
        $cst->fromJson(json_encode($st));
        $this->assertEquals($st, $cst);

        $rt = $this->mockConvRemoTransaction();
        $crt = new ConvRemortgageTransaction();
        $crt->fromJson(json_encode($rt));
        $this->assertEquals($rt, $crt);

        $rm = $this->mockConvResponseMessage();
        $crm = new ConvResponseMessage();
        $crm->fromJson(json_encode($rm));
        $this->assertEquals($rm, $crm);

        $export = $this->mockConvApiExport();
        $cExport = new ConvApiExport();
        $cExport->fromJson(json_encode($export));
        $this->assertEquals($export, $cExport);
    }

    public function testListInstructedCases()
    {
        $api = new IntroducerApi("FPRI-93e093bf-c5c7-4db9-b344-c21549b51c83-ba9cbc5d-0601-4a50-bcf3-6777fcf599dc");
        $response = $api->listInstructedCases();
        $this->assertEquals($response->getSystemId(), null);
    }

    public function testListCaseUpdates()
    {
        $api = new IntroducerApi("FPRI-93e093bf-c5c7-4db9-b344-c21549b51c83-ba9cbc5d-0601-4a50-bcf3-6777fcf599dc");
        $response = $api->listCaseUpdates();
        $this->assertEquals($response->getSystemId(), null);
    }

    private function mockConvAddress(): ConvAddress
    {
        $address = new ConvAddress();
        $address->setProperty("Property");
        $address->setStreet("Street");
        $address->setTown("Town");
        $address->setCity("City");
        $address->setCounty("County");
        $address->setPostcode("Postcode");
        return $address;
    }

    private function mockConvAgent(): ConvAgent
    {
        $agent = new ConvAgent();
        $agent->setContactName("Agent Name");
        $agent->setEmail("Agent Email");
        $agent->setTelephone("Agent Phone");
        $agent->setFirm("Agent Firm");
        $agent->setAddress($this->mockConvAddress());
        return $agent;
    }

    private function mockConvClient($matterRef = "MatRef", $conveyancerRef = "ConRef", $introducerRef = "IntRef"): ConvClient
    {
        $client = new ConvClient();
        $client->setMatterReference($matterRef);
        $client->setConveyancerReference($conveyancerRef);
        $client->setAddress($this->mockConvAddress());
        $client->setTelephone("Telephone");
        $client->setEmail("Email");
        $client->setForename("Forename");
        $client->setIntroducerReference($introducerRef);
        $client->setMiddlenames("Middlenames");
        $client->setMobile("Mobile");
        $client->setPortalId(123);
        $client->setSurname("Surname");
        $client->setTitle("Title");
        return $client;
    }

    private function mockConvContact($id = 123): ConvContact
    {
        $contact = new ConvContact();
        $contact->setId($id);
        $contact->setEmail("Email");
        $contact->setTelephone("Telephone");
        $contact->setAddress($this->mockConvAddress());
        $contact->setContactName("Contact Name");
        $contact->setBranchName("Branch Name");
        $contact->setFirmName("Firm Name");
        return $contact;
    }

    private function mockConvDate(): ConvDate
    {
        $date = new ConvDate();
        $date->setDate("2021-04-15");
        return $date;
    }

    private function mockConvDocument($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvDocument
    {
        $doc = new ConvDocument();
        $doc->setMatterReference($matterRef);
        $doc->setIntroducerReference($introducerRef);
        $doc->setConveyancerReference($conveyancerRef);
        $doc->setTransactionType(ConvTransactionType::SALE);
        $doc->setAccessUrl("Access URL");
        $doc->setAuthor("Author");
        $doc->setClientAccess(true);
        $doc->setConveyancerAccess(true);
        $doc->setIntroducerAccess(true);
        $doc->setCreated("2021-04-15T12:00:00");
        $doc->setDocumentUniqueIdentifier("Document Unique Identifier");
        $doc->setMimeType("application/pdf");
        $doc->setName("Document Name");
        return $doc;
    }

    private function mockConvEstimate($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvEstimate
    {
        $est = new ConvEstimate();
        $est->setCreated("2021-04-15T12:15:45");
        $est->setMatterReference($matterRef);
        $est->setConveyancerReference($conveyancerRef);
        $est->setIntroducerReference($introducerRef);
        $est->setCharge(123.45);
        $fees = $est->getFees();
        for ($i = 1; $i < 4; $i++) {
            array_push($fees, $this->mockConvEstimateFee($i));
        }
        $est->setFees($fees);
        $est->setReference("Estimate Ref");
        return $est;
    }

    private function mockConvEstimateFee($index = 1): ConvEstimateFee
    {
        $fee = new ConvEstimateFee();
        $fee->setName("Test Fee " . $index);
        $fee->setTransactionType(ConvTransactionType::SALE);
        $fee->setCommission(1 * $index);
        $fee->setDescription("Fee Description " . $index);
        $fee->setLegalFee($index % 2 == 0);
        switch ($index % 4) {
            case 0:
                $fee->setType(ConvEstimateFeeType::LEGAL_FEE);
                break;
            case 1:
                $fee->setType(ConvEstimateFeeType::DISBURSEMENT);
                break;
            case 2:
                $fee->setType(ConvEstimateFeeType::LAND_TAX);
                break;
            case 3:
                $fee->setType(ConvEstimateFeeType::ADDITIONAL);
                break;
        }
        $fee->setValue(100.00 * $index);
        $fee->setVat($fee->getValue() * 1.2);
        return $fee;
    }

    private function mockConvFeedback($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvFeedback
    {
        $fdb = new ConvFeedback();
        $fdb->setTransactionType(ConvTransactionType::SALE);
        $fdb->setMatterReference($matterRef);
        $fdb->setConveyancerReference($conveyancerRef);
        $fdb->setIntroducerReference($introducerRef);
        $fdb->setClients("Clients");
        $fdb->setComments("Comments");
        $fdb->setCompleted("2021-04-15T12:00:18");
        $fdb->setConsent(true);
        $fdb->setDisabled(false);
        $fdb->setDeadlines(10);
        $fdb->setExplainFees(10);
        $fdb->setExplainProcess(10);
        $fdb->setExplainTerminology(10);
        $fdb->setFirstImpressions(10);
        $fdb->setLegalProblems(10);
        $fdb->setOverallService(10);
        $fdb->setRecommendation(10);
        $fdb->setResponsiveness(10);
        $fdb->setThirdPartyCommunication(10);
        $fdb->setProperty("Property");
        $fdb->setStaffName("Staff Name");
        return $fdb;
    }

    private function mockConvNote($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvNote
    {
        $note = new ConvNote();
        $note->setMatterReference($matterRef);
        $note->setConveyancerReference($conveyancerRef);
        $note->setIntroducerReference($introducerRef);
        $note->setTransactionType(ConvTransactionType::SALE);
        $note->setCreated("2021-04-15T12:30:45");
        $note->setAuthor("Author");
        $note->setNote("Test Note");
        return $note;
    }

    private function mockConvPurchaseTransaction($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvPurchaseTransaction
    {
        $pt = new ConvPurchaseTransaction();
        $pt->setMatterReference($matterRef);
        $pt->setConveyancerReference($conveyancerRef);
        $pt->setIntroducerReference($introducerRef);
        $pt->setIntroducer($this->mockConvContact());
        $pt->setConveyancer($this->mockConvContact());
        $pt->setAddress($this->mockConvAddress());
        $pt->setAgent($this->mockConvAgent());
        $pt->setLastUpdated("2021-04-15T12:35:00");
        $pt->setAmount(120000);
        $pt->setTenure(ConvTenureType::FREEHOLD);
        $pt->setOnlineWelcomePack(true);
        $pt->setIntoAbeyance("2021-04-15");
        $pt->setOutOfAbeyance("2021-04-15");
        $pt->setMortgage(true);
        $pt->setFirstTimeBuyer(false);
        $pt->setHigherSdltRate(true);
        $pt->setTaxRegion(ConvTaxRegionType::ENGLAND);
        return $pt;
    }

    private function mockConvSaleTransaction($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvSaleTransaction
    {
        $st = new ConvSaleTransaction();
        $st->setMatterReference($matterRef);
        $st->setConveyancerReference($conveyancerRef);
        $st->setIntroducerReference($introducerRef);
        $st->setIntroducer($this->mockConvContact());
        $st->setConveyancer($this->mockConvContact());
        $st->setAddress($this->mockConvAddress());
        $st->setAgent($this->mockConvAgent());
        $st->setLastUpdated("2021-04-15T12:35:00");
        $st->setAmount(120000);
        $st->setTenure(ConvTenureType::FREEHOLD);
        $st->setOnlineWelcomePack(true);
        $st->setIntoAbeyance("2021-04-15");
        $st->setOutOfAbeyance("2021-04-15");
        $st->setMortgage(true);
        return $st;
    }

    private function mockConvRemoTransaction($matterRef = "MatRef", $introducerRef = "IntRef", $conveyancerRef = "ConRef"): ConvRemortgageTransaction
    {
        $rt = new ConvRemortgageTransaction();
        $rt->setMatterReference($matterRef);
        $rt->setConveyancerReference($conveyancerRef);
        $rt->setIntroducerReference($introducerRef);
        $rt->setIntroducer($this->mockConvContact());
        $rt->setConveyancer($this->mockConvContact());
        $rt->setAddress($this->mockConvAddress());
        $rt->setAgent($this->mockConvAgent());
        $rt->setLastUpdated("2021-04-15T12:35:00");
        $rt->setAmount(120000);
        $rt->setTenure(ConvTenureType::FREEHOLD);
        $rt->setOnlineWelcomePack(true);
        $rt->setIntoAbeyance("2021-04-15");
        $rt->setOutOfAbeyance("2021-04-15");
        $rt->setTransferOfEquity(false);
        return $rt;
    }

    private function mockConvResponseMessage(): ConvResponseMessage
    {
        $rm = new ConvResponseMessage();
        $rm->setMessage("Message");
        return $rm;
    }

    private function mockConvApiExport(): ConvApiExport
    {
        $exp = new ConvApiExport();
        $exp->setExportId(123);
        $exports = [];
        array_push($exports, $this->mockConvSaleTransaction());
        array_push($exports, $this->mockConvClient());
        array_push($exports, $this->mockConvNote());
        array_push($exports, $this->mockConvEstimate());
        array_push($exports, $this->mockConvDocument());
        array_push($exports, $this->mockConvFeedback());
        $exp->setExports($exports);
        return $exp;
    }
}
