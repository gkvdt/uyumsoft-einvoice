<?php
namespace Gkvdt\UyumsoftEinvoice\WdslRequests;

class GetOutboxInvoicePdf extends WsdlRequest implements IWsdlRequest {

   // public $inoviceId ="e2c7d448-12e8-4dd8-81a4-e1b6529cee4c";
    public $invoiceId = "";//"f5a26584-7ac8-42de-aacd-bf089be05876";

    public function getParams(){
        return [
            'invoiceId' =>  $this->invoiceId 
        ];
    }

    public function request(){
        $params = $this->setParams($this->getParams());
        return $this->wsdl->GetOutboxInvoicePdf($params);
    }

}