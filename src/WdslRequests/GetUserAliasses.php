<?php

namespace Modules\EInvoice\WdslRequests;


class GetUserAliasses extends WsdlRequest implements IWsdlRequest
{
    public $vknTckn = null;


    public function getParams()
    {
        $data =  [
            'vknTckn' => $this->vknTckn
        ];
        return $data;
    }
    
    public function request()
    {
        $params = $this->setParams($this->getParams());
        return $this->wsdl->GetUserAliasses($params);
    }
}
