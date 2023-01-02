<?php

namespace Modules\EInvoice\WdslRequests;

use App\ApiServices;
use App\Helper\Reply;
use SoapClient;

class WsdlRequest
{
     //private $wsdlUrl = "http://efatura-test.uyumsoft.com.tr/Services/BasicIntegration?wsdl"; //Test wsdUrl
     //private $wsdlUrl   = "http://efatura.uyumsoft.com.tr/Services/BasicIntegration?wsdl"; // Real wsdUrl

    private $wsdlUrl=""; 
    public $wsdl = null;
  
    public $userInfo = null;
    public $params = null;

    public function __construct()
    {
        $this->wsdlUrl = $this->uyumsoftApiInfos()->api_link;
        $this->userInfo = array(
        /*
            'Username' => 'Uyumsoft', //test
            'Password' => 'Uyumsoft', //test  
        */
             
          'Username' => $this->uyumsoftApiInfos()->user_name,//'RenpetYatirim_WebServis', //real
          'Password' => $this->uyumsoftApiInfos()->password,//'6@2RjooZ', //real
             

        );
        $this->params = [
            "userInfo" => $this->userInfo,
            //'invoiceId' => "e2c7d448-12e8-4dd8-81a4-e1b6529cee4c"
        ];

        $this->wsdl =  new SoapClient($this->wsdlUrl, $this->userInfo);
       
    }

    private function uyumsoftApiInfos(){
       $apiInfos = ApiServices::where("type","e-invoice")->first();
       return $apiInfos;
    }


    public function setParams(array $params){
        $temp = [
            "userInfo" => $this->userInfo,
        ];
        foreach ($params as $key => $value){
            $temp[$key] = $value;
        }
        return $temp;
    }
}
