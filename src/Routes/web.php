<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Helper\Reply;
use Modules\EInvoice\WdslRequests\SendInvoice;

Route::prefix('einvoice')->group(function() {
    Route::get('/', 'EInvoiceController@index');
});




Route::get('einvoice-sendmail/{id}',function($id){
    $sendInvoice = new SendInvoice($id);
    return $sendInvoice->sendMail();
})->name('einvoice.sendmail');

Route::get("download/einvoice/pdf/{einvoiceId}",'EInvoiceController@downloadOutboxInvoicePdf')->name("download.einvoice.pdf"); 