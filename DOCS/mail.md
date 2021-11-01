E-Posta İşlemleri Dökümanı

### TANIMLAMA
```php
$mail = $organik->mail(); 
```

<hr>

### Gönderim İşlemleri

#### E-Posta Gönder
```php
$mail->send($template)->start($sender, $title, $groups, $recipients, $date=null, $commercial=null);
```

<hr>

### Rapor İşlemleri

#### Gönderimleri Listele
```php
$mail->report()->get("2021-01-01", "2020-01-07");
```

#### Gönderim Detayı
```php
$mail->report($id)->detail();
```

<hr>

### Şablonlar

#### Şablonları Listele
```php
$mail->template()->get();
```

<hr>

### Alıcı Grupları

#### Tümünü Listele
```php
$mail->group()->get();
```

<hr>

### Alıcılar

#### Kişileri Listele
```php
$mail->recipient()->get($groupid);
```

#### Kişi Ekle
```php
$mail->recipient()->add($groupid, $email, $name, $surname);
```

#### Çoklu Kişi Ekle
```php
$mail->recipient()->add($groupid, [
  [
    'email' => 'recipient1@example.com',
    'name'  => 'Charlie',
    'surname' => 'Chaplin'
  ],
  [
    'email' => 'recipient2@example.com'
  ]
]);
```

#### Kişi Düzenle
```php
$mail->recipient($id)->set($email, $name, $surname);
```

#### Kişi Sil
```php
$mail->recipient($id)->delete();
```

<hr>

### Gönderen Adresleri

#### Tümünü Listele
```php
$mail->sender()->get();
```
