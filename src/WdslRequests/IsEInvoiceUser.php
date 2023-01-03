<?php

namespace Gkvdt\UyumsoftEinvoice\WdslRequests;

use Gkvdt\UyumsoftEinvoice\Entities\ID;

class IsEInvoiceUser extends WsdlRequest implements IWsdlRequest
{

    private $vkn = "";

    public function __construct($vkn)
    {
        parent::__construct();
        $this->vkn = $vkn;
    }

    public function getParams()
    {
        return [
            'vknTckn' =>  $this->vkn
        ];
    }

    public function request()
    {
        $params = $this->setParams($this->getParams());
        return $this->wsdl->IsEInvoiceUser($params);
    }


    public function result()
    {
        $res = $this->request()->IsEInvoiceUserResult;
       // return json_encode($res);
        
        if ($res->IsSucceded) {
            
            if ($res->Value)
                return ID::EINVOICE;
            else
                return ID::EARCHIVE;
        }
        return "";
    }
}
