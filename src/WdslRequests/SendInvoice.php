<?php

namespace Modules\EInvoice\WdslRequests;

use App\ClientDetails;
use App\Helper\Reply;
use App\Invoice as AppInvoice;
use App\Notifications\SendInvoiceMail;
use App\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Modules\EInvoice\Entities\Company;
use Modules\EInvoice\Entities\Invoice;
use Modules\EInvoice\Entities\LegalMonetaryTotal;
use Modules\EInvoice\Entities\TaxTotal;

class SendInvoice extends WsdlRequest implements IWsdlRequest
{

    // public Company $company;


    public  $invoiceLine = [];
    private $invoice = null;
    private $mail = null;

    public function __construct($invoiceId)
    {
        parent::__construct();

        $invoice = AppInvoice::findOrFail($invoiceId);
        $this->invoice = $invoice;
        $this->company = new Company($invoice->client_id);
        $this->user = User::find($invoice->client_id);
        $this->cd = ClientDetails::where('user_id',$this->user->id)->first();
        try {
            $this->mail = $this->user->email;
        } catch (Exception $e) {
        }
        $this->setInvoiceLine($invoice);
    }

    private function setInvoiceLine($invoice)
    {

        foreach ($invoice->items as $item) {
            array_push($this->invoiceLine, [
                "name" => $item->item_name,
                "unitPrice" =>  floatval($item->unit_price) / floatval(1.18),
                "amount" =>  $item->quantity,
                "description" => "",
                "discount" => $item->total_discount,
            ]);
        }
    }

    private function getDiscountRate()
    {
        $price = floatval($this->invoice->total)/1.18;
        $dr = floatval($this->invoice->discount);
        return (floatval($dr) * 100) / floatval($price + $dr);
    }
    
    public function getParams()
    {
        $data =  [
            'company' => $this->company->getData(),
            'notes' => $this->getNotes(),
            'invoiceLine' => $this->getInvoiceLine(),
            'userInfo' => $this->userInfo,
            'discountRate' => $this->getDiscountRate(),
            'allowanceTotal' => $this->invoice->discount,
            'issueDate' => Carbon::parse($this->invoice->issue_date, 'UTC')->isoFormat('YYYY-MM-DD'),
            'mail' => $this->mail,
            "code" => $this->cd->invoice_code,
        ];
        return $data;
    }

    private function getInvoiceLine()
    {

        return $this->invoiceLine;
    }

    private function getNotes()
    {
        return [
            "VADE TARIHI : " . Carbon::parse($this->invoice->due_date)->format('d/m/Y'),

            Carbon::parse($this->invoice->inv_range1)->format('d/m/Y') . " - " .  Carbon::parse($this->invoice->inv_range2)->format('d/m/Y') . " Tarihleri Opet Otobil Satışları Faturası",
        //  "Türkiye İş Bankası TR620006400000161310009062"
            "Türkiye İş Bankası TR41 0006 4000 0016 1310 0132 23"

        ];
    }
    public function request()
    {

        //return json_encode($this->getParams());

        $uri = "https://einvoice.otobilsistem.com.tr"; //"http://efatura-test.uyumsoft.com.tr/api/BasicIntegrationApi";

        //$uri = "http://127.0.0.1:3000/sendInvoice"; //"http://efatura-test.uyumsoft.com.tr/api/BasicIntegrationApi";
        $client = new Client();
        $res = $client->request('GET', $uri, ['query' => $this->getParams()]);
        $response = $res->getBody();
        //$r = json_decode($response);
        //$uid = $r[0]->Data->Value[0]->Id;
        //$mail = $r[1]->Mailing[0]->To;
        //$this->getInvoiceViewIsSuccess($uid, $mail);
        return $response; // [$uid,$mail]; // $response;
    }

    public function sendMail()
    {
        if($this->invoice->forward_inv_id == null) return Reply::error("Henüz e-fatura oluşturulmamıştır.");
        $client = User::find($this->invoice->client_id);
        $cc = "";
        $subject = "Otobil Faturası";
        $view = "<div><p>Sayın ". $client->name .'</p> <p><a href="https://portal.uyumsoft.com.tr/Genel/Fatura/'.$this->invoice->forward_inv_id . '" >Burdan </a> faturanızı görüntüleyebilir veya indirebilirisiniz. </p><p>Saygılarımızla,Renpet Yatırim Ltd.Şti.</p>';
        $client->notify(new SendInvoiceMail($cc,$subject,$view));
     //   $this->getInvoiceViewIsSuccess($this->invoice->forward_inv_id, $mail);
        return Reply::success('Mail başarıyla gönderildi.');
    }
    private function getInvoiceViewIsSuccess($invoiceId, $mail) //@deprecated
    {
        $v = new GetOutboxInvoiceView();
        $f = new GetOutboxInvoicePdf();
        $v->inoviceId = $invoiceId;
        $f->inoviceId = $invoiceId;
        $r = $v->request();
        if ($r->GetOutboxInvoiceViewResult->IsSucceded) {
            $view =  $r->GetOutboxInvoiceViewResult->Value->Html;
            $u = User::find(40);
            $u->notify(new SendInvoiceMail($mail, 'Otobil Faturası', $view));
            return $view;
        }
    }
}
