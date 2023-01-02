<?php
namespace Modules\EInvoice\WdslRequests;

interface IWsdlRequest {
    public function request();
    public function getParams();
}