<?php

namespace Modules\EInvoice\Entities;


class Invoice
{

    //public $UBLExtensions = null;
    //public $ID = $this->generateID();
    //public $UUID = $this->getGUID(); 
    // public $Note  = []; //string
    // public $InvoicePeriod = null; //Fatura Dönemi ??
    public $UBLVersionID  = "2.1";
    public $CustomizationID  = 'TR1.2';
    public $ProfileID = ProfileID::TEMELFATURA; // null;
    public $CopyIndicator = false;
    public $IssueDate = null; // date('Y-m-d');
    public $IssueTime = null; //date('H:i:s');
    public $InvoiceTypeCode = InvoiceTypeCode::SATIS;
    public $DocumentCurrencyCode = "TRY";
    public $LineCountNumeric = 1; //Bu elemana fatura üzerinde yer alan kalem sayısı yazılacaktır.Malın adedi birden fazla olsa dahi bu mal grubu tek bir kalem Kullanım Örnek olarak gösterilecektir.
    public $AccountingSupplierParty = null;
    public $AccountingCustomerParty = null;
    public $TaxTotal = null;
    public $LegalMonetaryTotal = null;
    public $InvoiceLine    =  null; //new InvoiceLine();


    public function __construct( TaxTotal $taxTotal)
    {
        $this->IssueDate = date('Y-m-d');
        $this->IssueTime = date('H:i:s');
        $this->AccountingCustomerParty =  new AccountingCustomerParty();
        $this->AccountingSupplierParty = new AccountingSupplierParty();
        $this->TaxTotal = $taxTotal;
        $this->InvoiceLine = new InvoiceLine($taxTotal);
        $this->LegalMonetaryTotal = new LegalMonetaryTotal($taxTotal);



    }


    public function getParams()
    {
        return [

            "UBLVersionID" => $this->UBLVersionID,
            "CustomizationID" => $this->CustomizationID,
            "ProfileID" => $this->ProfileID,
            "CopyIndicator" => $this->CopyIndicator,
            "IssueDate" => $this->IssueDate,
            "IssueTime" => $this->IssueTime,
            "InvoiceTypeCode" => $this->InvoiceTypeCode,
            "DocumentCurrencyCode" => $this->DocumentCurrencyCode,
            "LineCountNumeric" => $this->LineCountNumeric,
            "AccountingSupplierParty" => $this->AccountingSupplierParty->getParams(),
            "AccountingCustomerParty" => $this->AccountingCustomerParty->getParams(),
            "TaxTotal" => $this->TaxTotal->getParams(),
            "LegalMonetaryTotal" => $this->LegalMonetaryTotal->getParams(),
            "InvoiceLine" => $this->InvoiceLine->getParams(),

        ];
    }


    //public $TaxCurrencyCode = null;
    //public $PricingCurrencyCode = null;
    //public $PaymentCurrencyCode = null;
    //public $PaymentAlternativeCurrencyCode = null;
    //public $AccountingCost = null;
    //public $OrderReference = null;
    //public $BillingReference = null;
    //public $DespatchDocumentReference = null;
    //public $ReceiptDocumentReference = null;
    //public $OriginatorDocumentReference = null;
    //public $ContractDocumentReference = null;
    //public $AdditionalDocumentReference = null;
    //public $Signature = null;
    //public $BuyerCustomerParty = null;
    //public $SellerSupplierParty = null;
    //public $TaxRepresentativeParty = null;
    //public $Delivery = null;
    //public $PaymentMeans = null;
    //public $PaymentTerms = null;
    //public $AllowanceCharge = null;
    //public $TaxExchangeRate = null;
    //public $PricingExchangeRate = null;
    //public $PaymentExchangeRate = null;
    //public $PaymentAlternativeExchangeRate = null;
    //public $WithholdingTaxTotal = null;

}
