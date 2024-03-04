# Project Semester 4

Manajemen ujian siswa

## Persyaratan
- git
- xampp 8.1.25^
- composer v2.6.x ^
- node v21.6.1^
- text editor (VSCode)
# Installasi
## Windows 
1. pull atau clone dari repo ini
 2. ubah nama .envexample menjadi ".env"
3. jalankan "composer install"
4. jalankan "npm install
5. jalankan "php artisan migrate" (pastikan memiliki database bernama 'semaga' di mysql)
6. setelah itu jalankan "php artisan key:generate"
7. jalankan "php artisan serve"
8. jalankan "npm run dev" di terminal baru (Jalankan 2 Terminal secara bersamaan untuk langkah 7 & 8)
9. finish


## Linux
verifikasi persyaratan telah dijalankan sesuai atau tidak pada mesin mu
 
 `node --version` atau `npm --version`,

 `php --version`,

 `composer --version`.
### langkah awal
1. jalankan XAMPP (Aktifkan  Apache,dan MySQL).
2. Buka terminal.
3. clone repository semaga:

    ```bash
    git clone https://github.com/fadiaskeyn/semaga.git && cd semaga
    ```
4. buka tab baru terminal, jalankan composer install :`composer install`.

catatan! jika composer tidak memenuhi syarat akan terjadi eror silahkan update sesuai kententuan dari persyaratan.

5. jalankan npm install: `npm install`
6. copy file .env.example ke .env `cp .env.example .env`
7. silahkan setup database
8. jalankan perintah artisan key:generate `php artisan key:generate`
9. jalankan server php `php artisan serve`
10. jalankan vite `npm run dev`
11. jalankan migrasi dan seeder `php artisan migrate:fresh --seed`
12. jalankan pada browser, paste pada url `127.0.0.1:8000`

    catatan! default username login sebagai admin, admin@gmail.com password    admin123. sedangkan, pada pengguna user default user@gmail.com password user123.
### setup database
1. Buka Terminal
2. jalankan mysql
    
    ```bash
    sudo mysql -u <username_root> -p <password>
    ```
bawaan xampp mysql username = root dan password kosong

3. buatlah database semaga `MariaDB[(none)]> CREATE DATABASE semaga;`
4. keluar dari mysql `MariaDB[(none)]> exit;`

## Penggunaan

0. Nyalakan XAMPP (turn On Apache,and MySQL)
1. Langkah Pertama.
    ```bash
    php artisan serve
    ```

2. Langkah Kedua.
    ```bash
    npm run dev
    ```
