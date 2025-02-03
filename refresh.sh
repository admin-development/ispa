source .env

# php artisan cache:clear

if [[ $1 -eq "soft" ]]
then
    php artisan migrate:refresh
    php artisan db:seed DataSeeder
else
    php artisan drop:database $DB_DATABASE
    php artisan migrate --force
    php artisan db:seed DataSeeder
fi