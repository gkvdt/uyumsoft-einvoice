<?php



namespace Modules\EInvoice\Entities;
class AllowanceCharge
{

    public $ChargeIndicator = "";
    public $AllowanceChargeReason = "";
    public $MultiplierFactorNumeric = "";
    public $Amount = "";
    public $BaseAmount = "";


    public  function getParams()
    {
        return [
            "ChargeIndicator" => $this->ChargeIndicator,
            "AllowanceChargeReason" => $this->AllowanceChargeReason,
            "MultiplierFactorNumeric" => $this->MultiplierFactorNumeric,
            "Amount" => ["_" => $this->Amount, "currencyID" => "TRY"],
            "BaseAmount" => ["_" => $this->BaseAmount, "currencyID" => "TRY"]
        ];
    }
}
