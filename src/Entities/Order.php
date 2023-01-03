<?php

namespace Gkvdt\UyumsoftEinvoice\Entities;

class Order
{

    public $fiyat = 0;
    public $adet = 0;
    public $ad = "item";


    public function __construct($fiyat, $adet, $ad)
    {
        $this->ad = $ad;
        $this->fiyat = $fiyat;
        $this->adet = $adet;
    }
}
