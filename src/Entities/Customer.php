<?php

namespace Gkvdt\UyumsoftEinvoice\Entities;

class Customer
{

    public $customerTc = "11111111111";
    public $customerName = "Musteri";
    public $customerSurname = "Soyadi";
    public $customerAddress = "Adres1";
    public $customerPhoneNumber = "05455455544";
    public $customerEmail = "customer@mail.com";

    public $buildingNumber = "";
    public $citySubdivisionName = "";
    public $cityName  = "";
    public $country= "";




    public static function instance($customerTc, $customerName, $customerSurname, $customerAddress, $customerPhoneNumber, $customerEmail)
    {
        $instance = new Customer();
        $instance->customerTc = $customerTc;
        $instance->customerName = $customerName;
        $instance->customerSurname = $customerSurname;
        $instance->customerAddress = $customerAddress;
        $instance->customerPhoneNumber = $customerPhoneNumber;
        $instance->customerEmail = $customerEmail;
        return $instance;
    }
}
