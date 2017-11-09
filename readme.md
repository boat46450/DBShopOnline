# DB Shop Online int203
## Prepare your computer dev this code
1. Install composer by
```
composer install
```
2. Copy .env.example to .env by
```
cp .env.example .env
```
3. Change variable in .env
```
DB_DATABASE=[your new DB]
DB_USERNAME=[your username]
DB_PASSWORD=[your password]
```
## Build Table by this order
```
php artisan migrate
```

## Command to mock data in DB by seed file
```
composer dump-autoload
php artisan db:seed --class=ชื่อไฟล์seed
```
please seed order following below : 
1. customers
2. users
3. shops
4. userShops
5. brands
6. catalogs
7. brandCatalogs
8. products
9. payments
10. shippings
11. orders
12. orderLists