<?php

namespace Modules\EInvoice\Entities;
class AccountingSupplierParty
{


    public $WebsiteURI = "http://www.aaa.com.tr";
    public $PartyIdentification = "1288331521";
    public $PartyName = "AAA Anonim Şirketi";
    public $ID = "1234567890";
    public $StreetName = "Papatya Caddesi Yasemin Sokak";
    public $BuildingNumber = "21";
    public $CitySubdivisionName = "Beşiktaş";
    public $CityName = "İstanbul";
    public $PostalZone = "34100";
    public $CountryName = "Türkiye";
    public $TaxSchemeName = "Büyük Mükellefler";
    public $Telephone = "(212) 925 51515";
    public $Telefax = "(212) 925505015";
    public $ElectronicMail = "aa@aaa.com.tr";

    public function getParams()
    {
        return
            [
                "Party" => [
                    "WebsiteURI" =>  $this->WebsiteURI,
                    "schemeID" => "VKN",
                    "PartyIdentification" => $this->PartyIdentification,
                    "PartyName" => [
                        'Name' => $this->PartyName
                    ],
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
                    "PartyTaxScheme" => [
                        "TaxScheme" => [
                            "Name" => $this->TaxSchemeName
                        ],
                    ],
                    "Contact" => [
                        "Telephone" => $this->Telephone,
                        "Telefax" => $this->Telefax,
                        "ElectronicMail" => $this->ElectronicMail,
                    ],
                ]

            ];
    }
}



/*

     [
                "Party" => [
                    "WebsiteURI" =>  $this->WebsiteURI,
                    "PartyIdentification" =>  [
                        "_" => $this->PartyIdentification,
                        "schemeID" => "VKN"
                    ],
                    "PartyName" => [
                        'Name' => $this->PartyName
                    ],
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
                    "PartyTaxScheme" => [
                        "TaxScheme" => [
                            "Name" => $this->TaxSchemeName
                        ],
                    ],
                    "Contact" => [
                        "Telephone" => $this->Telephone,
                        "Telefax" => $this->Telefax,
                        "ElectronicMail" => $this->ElectronicMail,
                    ],
                ]

            ];
 

 */