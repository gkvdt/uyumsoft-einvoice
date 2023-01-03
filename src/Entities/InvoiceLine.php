<?php

namespace Gkvdt\UyumsoftEinvoice\Entities;

class InvoiceLine
{
    public $ID = 1;
    public $InvoicedQuantity = 1;
    private $LineExtensionAmount = null;
    public $Name = "benzin";
    public $PriceAmount = 5.5;
    private $TaxTotal;


    public function __construct(TaxTotal $taxTotal)
    {
        $this->TaxTotal = $taxTotal;
        $this->LineExtensionAmount =  $this->InvoicedQuantity * $this->PriceAmount;
    }
    public function getParams()
    {
        return [
            "ID" => $this->ID,
            'unitCode' => "LTR",
            "InvoicedQuantity"  => $this->InvoicedQuantity,
            "currencyID" => "TRY",
            "LineExtensionAmount" => $this->LineExtensionAmount, //birim fiyatı x birim adeti
            "TaxTotal" => $this->TaxTotal->getParams(),
            "Item" => [
                'Name' => $this->Name
            ],
            'Price' => [
                'currencyID' => "TRY",
                'PriceAmount' =>$this->PriceAmount, //birim fiyatı
            ]

        ];
    }




    /*

    public function getParams()
    {
        return [
            "ID" => $this->ID,
            "unitCode" => "LTR",
            "InvoicedQuantity" => $this->InvoicedQuantity, //birim adeti
            "currencyID" => "TRY",
            "LineExtensionAmount" => $this->InvoicedQuantity * $this->PriceAmount, //birim fiyatı x birim adeti
            "Name" => $this->Name,
            'SellersItemIdentification' => [
                'ID' => $this->SellersItemIdentificationID
            ],
            'Price' => [
                'PriceAmount' => $this->PriceAmount, //birim fiyatı
                'currencyID' => "TRY"
            ]
        ];
    }*/
}
