## create model
php artisan make:model Product -m
## tạo model vào datbase
php artisan migrate
## tạo controller
php artisan make:controller ProductController# laravel-2025
## clear static cache
```php
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```
# Chế Quang Vũ: 10 lần code syntax cở bản trên giấy bằng viết tay.
# Lê Văn vũ: 10 lần code syntax cở bản trên giấy bằng viết tay.
# Long vũ: 10 lần code syntax cở bản trên giấy bằng viết tay.

# login
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
# tao middlware
 php artisan make:middleware CheckRole  

config
mail

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="tabletindfire@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"