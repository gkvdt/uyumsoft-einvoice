<?php

namespace Modules\EInvoice\Entities;

class TaxTotal
{
    public $TaxAmount = null;
    public $Percent = 18;
    public $TaxableAmount = 0;

    public function __construct(float $taxableAmount)
    {
        $this->TaxableAmount = $taxableAmount;
        $this->TaxAmount = $taxableAmount / $this->Percent;
    }


    public function getParams()
    {
        return [

            "currencyID" => "TRY",
            "TaxAmount" =>  $this->TaxAmount,
            "TaxSubtotal" => [
                "currencyID" => "TRY",
                "TaxableAmount" =>  $this->TaxableAmount,
                "TaxAmount" =>$this->TaxAmount,
                "Percent" =>   $this->Percent,
                "TaxCategory" => [
                    "TaxScheme" => [
                        "name" => "KDV",
                        "taxtypecode" => "0015",
                    ]
                ],

            ]
        ];
    }
    /*
    public function getParams()
    {

        return [

            "TaxAmount" => [
                "currencyID" => "TRY",
                "_" => $this->TaxAmount
            ],
            "TaxSubtotal" => $this->getTaxs(),
        ];
    }
    private function getTaxs()
    {
        return [];
    }
    */
}
