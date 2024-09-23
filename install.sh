echo 'Start Installation'
date

cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed DataSeeder

date
echo 'Finish Installation'