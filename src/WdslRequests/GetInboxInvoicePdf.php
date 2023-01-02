<?php
namespace Modules\EInvoice\WdslRequests;

class GetInboxInvoicePdf extends WsdlRequest implements IWsdlRequest {


    public $inoviceId ="f5a26584-7ac8-42de-aacd-bf089be05876";
   

    /*public function __construct($invoiceId){
        $this->invoiceId= $invoiceId;
    }*/

    public function getParams(){
        return [
            'invoiceId' =>  $this->inoviceId 
        ];
    }

    public function request(){
     
        $params = $this->setParams($this->getParams());
      
        return $this->wsdl->GetInboxInvoicePdf($params);
    }



 

}