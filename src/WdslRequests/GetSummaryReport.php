<?php

namespace Modules\EInvoice\WdslRequests;


class GetSummaryReport extends WsdlRequest implements IWsdlRequest
{
    public $startDate = null;
    public $endDate = null;


    public function getParams()
    {
        $data =  [
            'startDate' =>  '2021-10-10', // date(DATE_ATOM, strtotime(now()) - 36000 * 20), // $this->ExecutionStartDate,
            'endDate' => '2021-11-11'// date(DATE_ATOM, strtotime(now())), //$this->ExecutionEndDate,
        ];
        return $data;
    }
    
    
    //FIXME: Message: "Beklenmeyen bir hata oluştu. Hata Detayı: Must declare the scalar variable "@PeriodFormat"."
    public function request()
    {
        $params = $this->setParams($this->getParams());
        return $this->wsdl->GetSummaryReport($params);
    }
}
