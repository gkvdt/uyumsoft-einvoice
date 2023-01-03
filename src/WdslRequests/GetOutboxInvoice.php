<?php

namespace Gkvdt\UyumsoftEinvoice\WdslRequests;

class GetOutboxInvoice extends WsdlRequest implements IWsdlRequest {


    //'invoiceId' => "e2c7d448-12e8-4dd8-81a4-e1b6529cee4c"

    public $inoviceId = "e2c7d448-12e8-4dd8-81a4-e1b6529cee4c";

    public function getParams(){
        return [
            'invoiceId' =>  $this->inoviceId 
        ];
    }

    public function request(){
        $params = $this->setParams($this->getParams());
        return $this->wsdl->GetOutboxInvoice($params);
    }



}