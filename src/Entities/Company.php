<?php

namespace Modules\EInvoice\Entities;

use App\ClientDetails;

class Company
{

    public $name = ""; //client company_name
    public $city = "";  //client city
    public $subdivision = ""; //client state
    public $address = ""; //client address
    public $vkn = ""; //vergi kimlik numarası 
    public $clientName = "";
    public $taxName = "";

    public function __construct(int $clientId)
    {
        $client = ClientDetails::where('user_id', $clientId)->first();
        $this->name = $client->company_name;
        $this->city = $client->city;
        $this->subdivision = $client->state;
        $this->address = $client->address;
        $this->vkn = $client->tax_num;
        $this->clientName = $client->name;
        $this->taxName = $client->tax_name;
    }


    public function getData()
    {

        return [
            "name" =>  $this->name,
            "city" =>  $this->city,
            "subdivision" =>  $this->subdivision,
            "address" =>  $this->address,
            "vkn" =>  $this->vkn,
            "clientName" =>  $this->clientName,
            "taxName" => $this->taxName
        ];
    }
}
