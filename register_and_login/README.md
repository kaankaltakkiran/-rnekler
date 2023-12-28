# Login And Register

 ## Php ile kullanıcı üye olma ve giriş yapma işlemlerini içermektedir. Kullanıcı siteye üye olurken parolası hashlenmektedir.

## password_hash ve password_verify
 [password_hash](https://www.php.net/manual/en/function.password-hash.php)
 ```php
password_hash(string $password, string|int|null $algo, array $options = []): string
```
 [password_verify](https://www.php.net/manual/en/function.password-verify.php)

 ```php
password_verify(string $password, string $hash): bool
```
> **Not:** Databasede paraloyu varchar(255) yapmak önemli.

 ## Proje nasıl kullanılır?
- [ ] Proje clone edilir.
- [ ] Database klasöründe ki sql dosyası database import edilir.
- [X] Kullanıma hazır.

## Kullanıcı Bilgileri
Normal kullanıcı= email= ahmet@gmail.com password= 123
Admin kullanıcısı= email= admin@gmail.com password= admin
