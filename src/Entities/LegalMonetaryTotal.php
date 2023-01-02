<?php

namespace Modules\EInvoice\Entities;

class LegalMonetaryTotal
{
    public $LineExtensionAmount = null;
    public $TaxExclusiveAmount = null;
    public $TaxInclusiveAmount = null;
    public $PayableAmount = null;
    // public $AllowanceTotal = null;
    // public $PayableRoundingAmount = null;

    public function __construct(TaxTotal $tax)
    {

        $this->LineExtensionAmount =  $tax->TaxableAmount;
        $this->TaxExclusiveAmount =  $tax->TaxableAmount;
        $this->TaxInclusiveAmount =  $tax->TaxableAmount + $tax->TaxableAmount;
        $this->PayableAmount =  $tax->TaxableAmount + $tax->TaxableAmount;
    }

    public function getParams()
    {
        return [
            "currencyID" => "TRY",
            'LineExtensionAmount' => $this->LineExtensionAmount,
            "TaxExclusiveAmount" => $this->TaxExclusiveAmount,
            "TaxInclusiveAmount" => $this->TaxInclusiveAmount,
            // "AllowanceTotal" => [
            //     "_" => $this->AllowanceTotal,
            //     "currencyID" => "TRY"
            // ],
            // "PayableRoundingAmount" => [
            //     "_" => $this->PayableRoundingAmount,
            //     "currencyID" => "TRY"
            // ],
            "PayableAmount" =>  $this->PayableAmount
        ];
    }
}
