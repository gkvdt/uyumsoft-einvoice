<?php

namespace Gkvdt\UyumsoftEinvoice\Entities;
class Signature
{

public $ID = "";
public $PartyIdentification = "";
public $PostalAddressID = "";
public $StreetName = "";
public $BuildingNumber = "";
public $CitySubdivisionName = "";
public $CityName = "";
public $PostalZone = "";
public $CountryName = "";
public $URI = "";

    public function getParams()
    {
        return [
            "ID"  => $this->ID,
            "SignatoryParty" => [
                "PartyIdentification" =>  [
                    "_" => $this->PartyIdentification,
                    "schemeID" => "VKN"
                ],
                "PostalAddress" => [
                    "ID" => $this->PostalAddressID,
                    "StreetName" => $this->StreetName,
                    "BuildingNumber" => $this->BuildingNumber,
                    "CitySubdivisionName" => $this->CitySubdivisionName,
                    "CityName" => $this->CityName,
                    "PostalZone" => $this->PostalZone,
                    "Country" => [
                        "Name" => $this->CountryName
                    ],
                ],
            ],
            "DigitalSignatureAttachment"  => [
                "ExternalReference" => [
                    "URI" => $this->URI
                ]
            ]
        ];
    }
}

