# Php Mysql ile Form Veri Ekleme
Kullanıcıdan formdan gelen verileri `htmlspecialchars()` fonksiyonu ile güvenli bir şekilde kaydetmekteyiz.

htmlspecialchars, html etiketlerini etkisiz hale getirir. 

Örneğin `<script>` etiketi çalıştırılmaz. Bu sayede güvenlik sağlamış oluruz. 

Örneğin kullanıcı formdan `<script>alert("Hack Attempt!");</script>` gibi bir veri gönderirse bu veri veritabanına &lt;script&gt;alert(&quot;Hack Attempt!&quot;);&lt bu şekilde kaydedilir.
## Örnek Resimler
![image1](Screenshot_1.png)

![image2](Screenshot_2.png)
