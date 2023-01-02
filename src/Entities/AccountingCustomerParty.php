<?php

namespace Modules\EInvoice\Entities;

class AccountingCustomerParty
{


    public $TCKN = "1234567890";
    public $ID = "ATATÜRK MAH";
    public $StreetName = "6. Sokak";
    public $BuildingNumber = "3";
    public $CitySubdivisionName = "Beşiktaş";
    public $CityName = "İstanbul";
    public $PostalZone = "34100";
    public $CountryName = "Türkiye";
    public $ElectronicMail = "567890@mydn.com.tr<";
    public $FirstName = "Ali";
    public $FamilyName = "YILMAZ";
    public function getParams()
    {
        return
            [
                "Party" => [
                    "schemeID" => "TCKN",
                    "PartyIdentification" => $this->TCKN,
                    "PostalAddress" => [
                        "ID" => $this->ID,
                        "StreetName" => $this->StreetName,
                        "BuildingNumber" => $this->BuildingNumber,
                        "CitySubdivisionName" => $this->CitySubdivisionName,
                        "CityName" => $this->CityName,
                        "PostalZone" => $this->PostalZone,
                        "Country" => [
                            "Name" => $this->CountryName
                        ],
                    ],
                    "Contact" => [
                        "ElectronicMail" => $this->ElectronicMail,
                    ],
                    "Person" => [
                        "FirstName" => $this->FirstName,
                        "FamilyName" => $this->FamilyName,
                    ]
                ]

            ];
    }
}
