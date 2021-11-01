organikhaberlesme.com için PHP API Sınıfıdır.

### KURULUM
```php
// For Pure PHP (You have to download the files first)
include 'OrganikHaberlesme.php';

// For Candy PHP (No processing needed, you can use it directly. 😉)
Candy::plugin('EmreRed/OrganikHaberlesme-PHP-API-Client'); 
```
<a href="https://github.com/CandyPack/CandyPHP">🍭 Check out CandyPHP!</a>

<hr>

#### TANIMLAMA
```php
$organik = new OrganikHaberlesme($apikey);
```

<hr>


#### API Bilgileri Sorgula
```php
$organik->me();
```

<hr>

#### Detaylı İstek Bilgileri
```php
echo $organik->get()->request()->url;  // Yapılan son istek URL adresi
echo $organik->get()->request()->body; // Gönderilen son istek gövdesi
echo $organik->get()->result()->code;  // Son istekten dönen sonuç kodu
echo $organik->get()->result()->body;  // Son istekten dönen veri
```

<hr>

#### Kullanıcı İşlemleri
```php
$user = $organik->user();
```
<a href="https://github.com/EmreRed/OrganikHaberlesme-PHP-API-Client/DOCS/user.md">Kullanıcı İşlemleri Dökümanı</a>

<hr>

#### E-Posta İşlemleri
```php
$mail = $organik->mail();
```
<a href="https://github.com/EmreRed/OrganikHaberlesme-PHP-API-Client/DOCS/mail.md">E-Posta İşlemleri Dökümanı</a>
