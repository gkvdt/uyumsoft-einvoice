<?php
namespace Gkvdt\UyumsoftEinvoice\WdslRequests;

interface IWsdlRequest {
    public function request();
    public function getParams();
}