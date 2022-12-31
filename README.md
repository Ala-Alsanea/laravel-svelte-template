# Laravel-Svelte-Inertia [template]

## dependencies 
  - vite
  - inertia    
  - Tailwindcss
  - daisy UI
  - svelte
  - laravel



## Feature [ ToDo ]
  - [ ] CRUD
    - [ ] select click box in view
    - [ ] sort in view
    - [x] delete modal
    - [x] update form
    - [x] form server side validation
    - [x] paginate
    - [ ] file upload 
  - [ ] admin panel enhancement
    - [ ] order top nav
    - [ ] order side nav
  - [ ] user auth (login and register [ for admin only ] )
  - [ ] user rules
  - [ ] user profile
  - [ ] notification system


## Installation
```php
# install Laravel dependencies
composer install

# copy .env file
cp .env.example .env

# generate key for the app
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
