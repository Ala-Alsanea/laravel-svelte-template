# Laravel-Svelte-Tailwindcss-Inertia-Vite-[template]



## Feature
  - [ ] CRUD
    - [x] form server side validation
    - [ ] paginate
    - [ ] file upload 
  - [ ] user rules
  - [ ] user auth (login and register [ for admin only ] )
  - [ ] admin panel


## Installation
```php
# install Laravel dependencies
composer install

# copy .env file
cp .env.example .env

# to generate key for the app
php artisan key:generate 

# install Svelte, Tailwindcss and Inertia dependencies
npm install

# create sqlite database
touch database/database.sqlite

# migrate database and fill it with necessarily data
php artisan migrate:refresh --seed

# run the laravel server
php artisan serve 

# run svelte dev server
npm run dev 

#or

# build svelte and Inertia app
npm run build 
```
