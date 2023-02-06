1. buka git bash
2. git clone project yang ada di github
3. masuk kedalam folder projectnya
4. setelah itu ketik "composer install" (untuk menginstall package composer yang ada di project)
5. buat database baru
6. import file SQL ke database atau jalankan perintah migrate
7. copy file .env.example lalu rename menjadi ".env"
8. Lalu ubah nama databasenya pada file .env
9. setelah itu jalankan perintah php artisan key:generate untuk mendapatkan APP_KEY.
10. lalu jalankan php artisan serve untuk menjalankan projectnya.