#Skripsi Mubarok

###Requirements

* php 7.3 atau lebih
* mysql
* composer 2.0
* git
* node JS


###Cara Install

* Siapkan database kosong
* Masuk ke folder xampp/htdocs/
* Buka cmd dari folder tersebut
* clone project <code>git clone</code>
* msuk ke dalam project <code>cd/aka_group</code>
* copy file .env.example <code>cp .env.example .env</code>
* edit file .env dan masukan username dan password database
* jalnkan <code>composer install</code> dari cmd
* selnjutnya <code>npm install && npm run prod</code> dari cmd
* siapkan folder unutk upload <code>php artisan storage:link</code>
* untuk mengakses projek bisa melalui url <code>http://localhost/aka_group/public/ </code>
* atau jalan kan perintah <code>php artisan serve </code>  lalu akses melalui <code>http://localhost:8000 </code>
