# Php Mysql ile Form Veri Ekleme
Php ile formdan gelen verileri mysql veritabanına eklemek için örnek bir proje.
Kullanıcıdan formdan gelen verileri htmlspecialchars() fonksiyonu ile güvenli bir şekilde kaydetmekteyiz.
htmlspecialchars, html etiketlerini etkisiz hale getirir. Örneğin <script> etiketi çalıştırılmaz. Bu sayede güvenlik sağlamış oluruz. Örneğin kullanıcı formdan <script>alert("Hack Attempt!");</script> gibi bir veri gönderirse bu veri veritabanına &lt;script&gt;alert(&quot;Hack Attempt!&quot;);&lt bu şekilde kaydedilir.
## Örnek Resimler
![alt text](Screenshot_1.png)

![alt text](Screenshot_2.png)
