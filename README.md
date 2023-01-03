## Kurulum

İlk kurlum için `composer install gkvdt/uyumsoft_einvoice` kodunu çalıştırınız.

Ardından `config/app.php` dosyasında providers kısmına `Gkvdt\UyumsoftEinvoice\Providers\EInvoiceServiceProvider::class ` providerının ekleyiniz ve ardından `php artisan vendor:publish --tag="uyumsoft_einvoice"` komutunu çalıştırınız.

Migrations ve `config/uyumsoft_einvoice.php` dosyalarını publish ettikten sonra uygulamayı product modunda çalıştırmak için `config/uyumsoft_einvoice.php` içerisindeki

```
[
...
 'is_dev' => false
]
```

yapmanız yeterlidir.

Daha sonra `php artisan migrate` komutunu çalıştırdıktan sonra 2 yeni veri tabanı tablosu oluşacaktır. `ws_users` tablosu içerisinde Uyumsoftun kullanıcı adı ve şifresi yer almakta ve user_id ile login olmuş kullanıcı adına göre çekilmektedir. `ws_partys` şirket bilgilerini (adres,telefon vs.. ) içermektedir. (Bknz: [Party.php](https://github.com/gkvdt/uyumsoft-einvoice/blob/master/src/Entities/Party.php))
