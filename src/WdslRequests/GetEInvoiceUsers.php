<?php

namespace Modules\EInvoice\WdslRequests;
class GetEInvoiceUsers extends WsdlRequest implements IWsdlRequest
{
    public $PageIndex = 1;
    public $PageSize = 10;


    public function getParams()
    {
        $data =  [
            'pagination' => [
                'PageIndex' => $this->PageIndex,
                'PageSize' => $this->PageSize,
            ]
        ];
        return $data;
    }


    public function request()
    {
        $params = $this->setParams($this->getParams());
        return $this->wsdl->GetEInvoiceUsers($params);
    }
}
