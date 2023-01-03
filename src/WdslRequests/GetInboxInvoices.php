<?php

namespace Gkvdt\UyumsoftEinvoice\WdslRequests;


class GetInboxInvoices extends WsdlRequest implements IWsdlRequest
{
    public $PageIndex = 1;
    public $PageSize = 10;
    public $SetTaken = false;
    public $OnlyNewestInvoices = false;
    public $ExecutionStartDate = null;
    public $ExecutionEndDate = null;
    public $InvoiceIds = [];
    public $InvoiceNumbers = [];



    public function getParams()
    {
        $data =  [
            'query' => [
                'PageIndex' => $this->PageIndex,
                'PageSize' => $this->PageSize,
                'SetTaken' => $this->SetTaken,
                'OnlyNewestInvoices' => $this->OnlyNewestInvoices,
                'ExecutionStartDate' => date(DATE_ATOM, strtotime(now()) - 36000 * 20), // $this->ExecutionStartDate,
                'ExecutionEndDate' => date(DATE_ATOM, strtotime(now())), //$this->ExecutionEndDate,
            ]
        ];
        if (sizeof($this->InvoiceIds) > 0) {
            $data['query']['InvoiceIds']  = $this->InvoiceIds;
        }
        if (sizeof($this->InvoiceNumbers) > 0) {
            $data['query']['InvoiceNumbers']  = $this->InvoiceNumbers;
        }
        return $data;
    }


    public function request()
    {
        $params = $this->setParams($this->getParams());
        return $this->wsdl->GetInboxInvoices($params);
    }
}
