<?php

namespace Gkvdt\UyumsoftEinvoice\Http\Controllers;

use App\Helper\Reply;
use App\Invoice;
use App\Notification;
use App\Notifications\SendInvoiceMail;
use App\User;
use Gkvdt\UyumsoftEinvoice\Entities\Customer;
use Gkvdt\UyumsoftEinvoice\Entities\Order;
use Gkvdt\UyumsoftEinvoice\WdslRequests\SendInvoiceV2;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EInvoice\WdslRequests\SendInvoice;
//use Modules\EInvoice\Entities\Invoice;
use Modules\EInvoice\Entities\LegalMonetaryTotal;
use Modules\EInvoice\Entities\AccountingSupplierParty;
use Modules\EInvoice\Entities\AccountingCustomerParty;
use Modules\EInvoice\Entities\Company;
use Modules\EInvoice\Entities\TaxTotal;
use Modules\EInvoice\Entities\InvoiceLine;
use Modules\EInvoice\WdslRequests\GetOutboxInvoicePdf;
use Modules\EInvoice\WdslRequests\IsEInvoiceUser;
use Modules\ExcelParser\Entities\ExcelFile;
use SimpleXMLElement;

class EInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $order = [new Order('200',5,'Mustafa') ];
        $customer = new Customer();



        $e = new SendInvoiceV2($order,$customer,1234);
        return $e->request();
        return $e->test();

        //$e = ExcelFile::instance()->addRow(39)->addRow(40)->save()->sendMail();

        //

        //
        //$comp = new Company(23);

        $t = new SendInvoice(""); //4561
        $req = ($t->request());
        return  $req;
        return json_encode($req);
        die();
        $r = new IsEInvoiceUser(""); //23695921030
        return json_encode($r->result());
        //echo ($t->sendMail());
        //return $t->getParams();

        //$r = new GetSummaryReport();
        //$r = new GetOutboxInvoiceView();
        //$r = new GetOutboxInvoices();
        //$r = new GetOutboxInvoice();
        //$r = new GetInboxInvoiceView();
        //$r = new GetInboxInvoicePdf();
        //$r = new GetInboxInvoiceData();
        //$r = new GetInboxInvoice();
        //$r = new GetEInvoiceUsers();
        //$r = new GetOutboxInvoicePdf();
        //$r = new GetInboxInvoices();
        //$r = new GetOutboxInvoiceData();
        //echo $r->request()->GetOutboxInvoiceViewResult->Value->Html;
        //print_r($r->request());

    }

    public function sendInvoice($invoiceId)
    {
        $sendInvoice  = new SendInvoice($invoiceId);
        $response = $sendInvoice->request();
        return $response;
    }

    public function downloadOutboxInvoicePdf($outInvoiceId){
        /*-download e-fatura pdf ----*/
        
       $inv = $outInvoiceId;
       $invInfo = Invoice::where("forward_inv_id",$outInvoiceId)->first();
       if($invInfo){
           if( $invInfo->forward_inv_number !="" ){
            $invNumber = $invInfo->forward_inv_number.".pdf";
           }else{
            $invNumber = "FTR#".$invInfo->invoice_number.".pdf";
           }
          
        $instnace = new GetOutboxInvoicePdf();
        $instnace->invoiceId = $inv;
        $a =  $instnace->request();
       
       //forward_inv_number 
       header("content-type: application/pdf");
       header('Content-Disposition: attachment; filename='.$invNumber);
       echo $a->GetOutboxInvoicePdfResult->Value->Data;
       }else{
           return Reply::error("E-Fatura Bulunamadı");
       }
      
       /*---End. download e-fatura pdf-----*/
    }
}
