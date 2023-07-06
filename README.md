# PANDUAN INSTALASI

1. `` git clone --branch feature/add_api_rajaongkir https://github.com/far00kaja/test-dot-rajaongkir.git ``
2. `` cd pgsql-adminer``
3. `` docker compose up -d ``
4. `` composer install && php artisan key:generate``
5. buat file .env dari file .env.example dan masukan credential yang dibutuhkan seperti untuk database dan juga koneksi ke raja ongkir
6. `` php artisan migrate --seed ``
7. `` php artisan add:province ``
8. `` php artisan add:city ``
9. `` php artisan test ``
10. `` php artisan serve``

# Sample-api
untuk user login, bisa menggunakan email=user@email.com dan password  =  user123


``
curl --location 'http://localhost:8000/starter/province?id=2' \
--header 'key: 0df6d5bf733214af6c6644eb8717c92c' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iLCJpYXQiOjE2ODg2MTI2ODgsImV4cCI6MTY4ODYxNjI4OCwibmJmIjoxNjg4NjEyNjg4LCJqdGkiOiI1ZHpQdTdSNnVIcDl3aGt2Iiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CtryneXu4-uDiqMgTJsh6SJK2MRukQ8lhkO8_yydQBk'
``

``
curl --location 'http://localhost:8000/starter/city?id=12322' \
--header 'key: 0df6d5bf733214af6c6644eb8717c92c' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iLCJpYXQiOjE2ODg2MTI2ODgsImV4cCI6MTY4ODYxNjI4OCwibmJmIjoxNjg4NjEyNjg4LCJqdGkiOiI1ZHpQdTdSNnVIcDl3aGt2Iiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CtryneXu4-uDiqMgTJsh6SJK2MRukQ8lhkO8_yydQBk'
``