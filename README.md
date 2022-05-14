# Restful API menggunakan Laravel Passport 

Tujuan : Membangun rest api dan oauth token menggunakan laravel framework serta laravel passport 


1. Buatlah jwt authentication menggunakan laravel passport
2. Kemudian buatlah restful api posts (create, list all, show detail, update & delete)
3. Gunakan mekanisme middleware auth api passport ke endpoint posts (create, list all, show detail, update dan delete) 
4. Gunakan prefix versi pada api yang telah dibuat (contoh : api/v1)
5. Gunakan relasi eloquent pada table posts dan categories
6. Gunakan pagination pada api list all posts
7. Buatlah unit testing untuk setiap api posts
8. Untuk table yang digunakan silahkan refer pada link ini https://docs.google.com/document/d/18vr7dMZNmxeiT_CS6ofRTik8YygBraRvl0vscNXpRbQ/edit?usp=sharing
atau bisa dilihat dibawah

9.     ------------------    
       ### Articles
       ------------------
       * id
       * title
       * content
       * image
       * user_id
       * category_id
       ------------------
       ### Categories
       ------------------
        * id
        * name
        * user_id
        ------------------
       
<br><br>


# Membangun Blog Sederhana Menggunakan laravel Blade serta Laravel UI

Tujuan : Agar dapat menerapkan fitur blade serta laravel ui ke dalam project

1. Buatlah fitur authentication menggunakan laravel UI
2. Kemudian buatlah fungsional CRUD article serta category 
3. Gunakan laravel blade untuk membuat templatenya
4. Gunakan relasi laravel eloquent untuk menghubungkan relasi antar tabel
5. Gunakan seeder untuk membuat sample user
6. Unit testing setiap halaman crud dan fitur


### how to use
php artisan migrate:fresh --seed<br>
php artisan storage:link<br>
php artisan passport:client --personal<br>
1. If you use Postman or other api client app, set the Header,  Accept: application/json 
2.  goto http://127.0.0.1:8000/api/v1/register then http://127.0.0.1:8000/api/v1/login
3. copy token to Authorization in header ketika ingin masuk ke api categri atau artikel
4. untuk update metode put di postman dengan param
