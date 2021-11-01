organikhaberlesme.com için PHP API Sınıfıdır.

### SETUP
```php
// For Pure PHP (You have to download the files first)
include('OrganikHaberlesme.php'); 
$organik = OrganikHaberlesme();

// For Candy PHP (No processing needed, you can use it directly. 😉)
$organik = Candy::plugin('EmreRed/OrganikHaberlesme-PHP-API-Client'); 
```
<a href="https://github.com/CandyPack/CandyPHP">🍭 Check out CandyPHP!</a>

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
