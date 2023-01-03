<?php

namespace Gkvdt\UyumsoftEinvoice\WdslRequests;

use App\ApiServices;
use App\Helper\Reply;
use Gkvdt\UyumsoftEinvoice\Entities\WsUser;
use Illuminate\Support\Facades\Auth;
use SoapClient;

class WsdlRequest
{
    //private $wsdlUrl = "http://efatura-test.uyumsoft.com.tr/Services/BasicIntegration?wsdl"; //Test wsdUrl
    //private $wsdlUrl   = "http://efatura.uyumsoft.com.tr/Services/BasicIntegration?wsdl"; // Real wsdUrl

    const config =  [
        'test_wdsl' => 'http://efatura-test.uyumsoft.com.tr/Services/BasicIntegration?wsdl', //Test wsdUrl
        'real_wdsl' => 'http://efatura.uyumsoft.com.tr/Services/BasicIntegration?wsdl', // Real wsdUrl
        "test_url" => "http://efatura-test.uyumsoft.com.tr/api/BasicIntegrationApi",
        "real_url" => "http://efatura-test.uyumsoft.com.tr/api/BasicIntegrationApi"
    ];
    public $wsdl = null;

    public $userInfo = null;
    public $params = null;



    public function __construct()
    {
        $this->userInfo = array(
            /*
            'Username' => 'Uyumsoft', //test
            'Password' => 'Uyumsoft', //test  
        */);
        $this->params = [
            "userInfo" => $this->getUser(),
            //'invoiceId' => "e2c7d448-12e8-4dd8-81a4-e1b6529cee4c"
        ];

        $this->wsdl =  new SoapClient($this->getWdslUrl(), $this->params['userInfo']);
    }


    public function getUser()
    {

        if (!config('is_dev')) {
            return WsUser::getUsernamePassword(Auth::user()->id);
        } else {

            return [
                'Username' => 'Uyumsoft', //test
                'Password' => 'Uyumsoft', //test  
            ];
        }
    }
    public function getUsername()
    {
        return $this->getUser()['Username'];
    }
    public function getPassword()
    {
        return $this->getUser()['Password'];
    }
    public function getUrl()
    {
        if (!config('is_dev'))
            return self::config['real_url'];
        return self::config['test_url'];
    }
    public function getWdslUrl()
    {
        if (!config('is_dev'))
            return self::config['real_wdsl'];
        return self::config['test_wdsl'];
    }


    public function setParams(array $params)
    {
        $temp = [
            "userInfo" => $this->userInfo,
        ];
        foreach ($params as $key => $value) {
            $temp[$key] = $value;
        }
        return $temp;
    }
}
