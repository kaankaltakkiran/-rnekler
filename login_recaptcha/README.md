# Login And Register with recaptcha

 ## **Recaptcha**  insan kullanıcıları botlardan ayırarak, web sitelerini spam ve kötüye kullanımdan korur.

### **Recaptcha** nasıl kullanılır?
Recaptcha kullanmak için önce https://www.google.com/recaptcha/admin/create linkinden api key almak için gerekli bilgileri giriyoruz.

![Screenshot_4](https://github.com/kaankaltakkiran/ornekler/assets/98158194/d71cad41-5664-4117-b5ca-bb9a2a9b0c80)

![Screenshot_5](https://github.com/kaankaltakkiran/ornekler/assets/98158194/04f4f477-d0c3-45b0-aa01-1ef30daf33ba)

Google, bize 2 tane key veriyor.

Site key: 6Lfj4z4pAAAAAIF5lNvjBmZh39iGikjsVVKCE0Tc

Secret key: 6Lfj4z4pAAAAAJ4uMc2gOLsUJmn4BRGkmS5pgGT6

> **Note:** Normalde bu keyler açıkca paylaşılmaz. Eğitim uygulaması olduğu için paylaşıyorum.

Daha sonra projemizde login sayfamıza aşşığıdaki kodları doğru yerlere ekliyoruz.

```html
<script src='https://www.google.com/recaptcha/api.js' async defer ></script>

```

```html
<div class="g-recaptcha" data-sitekey="site_key"></div>

```

### örnek kullanım

```html
<form method="POST">
    <div class="g-recaptcha" data-sitekey="site_key"></div>
    <input type="submit" name="login" value="Log in">
</form>

```
Dönen Cevap
```php
<?php
if(isset($_POST['login'])) {
    if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        echo 'reCAPTHCA verification failed, please try again.';
    } else {
        $secret = 'google_secret_key';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        if($response->success) {
            // What happens when the CAPTCHA was entered incorrectly
            echo 'Successful login.';
        } else {
            // Your code here to handle a successful verification
            echo 'reCAPTHCA verification failed, please try again.';
        }
    }
}

```
## Kullanıcı Bilgileri


| Users               |Email                          |Password                         |
|----------------|-------------------------------|-----------------------------|
|User Ahmet          |`ahmet@gmail.com`                     |`123`           |
|Admin               |`veli@gmail.com`                     |`admin`


 ## Site Resimleri

 https://github.com/kaankaltakkiran/php-proje-resimleri/tree/main/recaptcha_resimler
 
