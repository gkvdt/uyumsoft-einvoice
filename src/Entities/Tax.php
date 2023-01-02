<?php

namespace Modules\EInvoice\Entities;
class Tax
{

    public $TaxableAmount = "";
    public $TaxAmount = "";
    public $CalculationSequenceNumeric = "";
    public $Percent = "";
    public $TaxScheme = "";


    public function getParams()
    {

        return [
            "TaxableAmount" => $this->TaxableAmount,
            "TaxAmount" => $this->TaxAmount,
            "CalculationSequenceNumeric" => $this->CalculationSequenceNumeric,
            "Percent" => $this->Percent,
            "TaxCategory" => [
                "TaxScheme" => $this->TaxScheme
            ],

        ];
    }
}