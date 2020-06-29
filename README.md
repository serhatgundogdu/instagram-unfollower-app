# Instagram Takipten Çıkanlar

Script 3. parti bir api ile yapılmıştır. Localhost üzerisinde kullanmanızı tavsiye ederim. Başınıza gelebilecek sorunlardan sizin sorumlu olduğunuzu da hatırlatmak isterim.

# Kurulum

1. İndirdiğiniz .sql dosyasını mysqle kurun.
2. Ana dizindeki config.php dosyasını açın. Database ve Hesap bilgilerinizi yazın.
3. Otomatik olarak gelen hesap bilgileri mail: admin@admin.com şifre: 123456
4. şifre oluşturmak için ana dizindeki createpass.php yi açıp düzenleyin ve çalıştırın.
5. Myqsl üzerisinden bilgileri düzenleyebilirsiniz.
6. İndex.php'de bulunan #allowDangerousWebUsageAtMyOwnRisk kısmına aşağıdaki kodu ekleyin.
7. Siteye giriş yapın ve takipçilerini kayıt etmesi için Takipten Çıkanları bul butonuna basın ve bir süre bekleyip sayfayı yenileyin.
8. Artık Kullanıma hazırsınız.
```
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
``` 
### BAŞINIZA GELECEK HER ŞEYDEN SİZ SORUMLUSUNUZ! Localhost üzerisinde kullanmanızı tavsiye ettiğimi tekrar hatırlatmak isterim.



