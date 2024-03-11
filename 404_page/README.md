# Localde Custom 404 Sayfası Oluşturmak
Localhostta çalışan 404 sayfası yapmak için öncelikle 404.php isimli sayfayı oluşturuyoruz. Bu sayfa, site de 404 hatası aldığımızda karşımıza çıkaçaktır.

Daha sonra .htaccess dosyasını oluşturuyoruz.
htaccess: **Apache** HTTP sunucularında kullanılan bir konfigürasyon dosyasıdır. Bu dosya, belirli bir dizinde veya alt dizinlerinde Apache sunucunun davranışını değiştirmenize ve yönlendirmenize izin verir. .htaccess dosyası, sunucu yapılandırması hakkında belirli değişiklikler yapmanıza olanak tanır ve bir web sitesinin performansını, güvenliğini ve erişilebilirliğini iyileştirmek için kullanılabilir.


# Örnek .htaccess Dosyası İçeriği

```apache
RewriteEngine on
RewriteBase /

# Defines 404 error pages content:
ErrorDocument 404 /ornekler/404_page/404.php

# for all invalid links (non existing files):
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule .* - [L,R=404]

# for some valid links (existing files to be un-accessible):
RewriteCond %{THE_REQUEST} ^.*some_file.php.*$ [NC]
RewriteRule .* - [L,R=404]
```

RewriteEngine on: URL yeniden yazımının etkinleştirilmesini sağlar. Bu, mod_rewrite modülünün çalışmasını sağlar.

RewriteBase /: Yeniden yazılan URL'lerin kök dizinine göre belirlenmesini sağlar. Yani, tüm yeniden yazılan URL'ler bu dizin altında değerlendirilir.

ErrorDocument 404 /Project_Name/404.php: 404 hatası durumunda gösterilecek belirli bir dosyayı belirtir. Bu durumda, 404.php dosyası Project_Name dizininde bulunmalıdır.

  > **Note:**  **404.php**, dosyasının hangi dizinde olduğunu burda belirtiyoruz. Bu kısmı doğru yazduğınızdan emin olmalısınız.

RewriteCond %{REQUEST_FILENAME} !-f: İstek edilen dosyanın (-f) var olmadığını kontrol eder. Eğer dosya yoksa, bu kurala devam eder.

RewriteCond %{REQUEST_FILENAME} !-d: İstek edilen dizinin (-d) var olmadığını kontrol eder. Eğer dizin yoksa, bu kurala devam eder.

RewriteRule .* - [L,R=404]: Yukarıdaki koşulların herhangi biri sağlanıyorsa (dosya veya dizin mevcut değilse), isteği 404 sayfasına yönlendirir.

RewriteCond %{THE_REQUEST} ^.*some_file.php.*$ [NC]: İsteğin (THE_REQUEST) içerdiği metni kontrol eder. Burada "some_file.php" metnini arar. [NC] kısmı ise büyük-küçük harf duyarlı olmadığını belirtir.

RewriteRule .* - [L,R=404]: Eğer istek "some_file.php" metnini içeriyorsa, isteği 404 sayfasına yönlendirir.

![Screenshot_4](https://github.com/kaankaltakkiran/ornekler/assets/98158194/f91f4656-6d0e-4f3a-a218-1c58ac5218af)

