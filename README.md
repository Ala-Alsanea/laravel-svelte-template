# Laravel-Svelte-Inertia [template]

## dependencies 
  - vite
  - inertia    
  - Tailwindcss
  - daisy UI
  - svelte
  - laravel



## Feature [ ToDo ]
  - [x] CRUD
    - [ ] select click box in view
    - [ ] sort in table
    - [x] delete modal
    - [x] update form
    - [x] form server side validation
    - [x] paginate
    - [ ] detail page
    - [ ] file upload 
    - [ ] search
  - [ ] admin panel enhancement
    - [ ] order top nav
    - [x] order side nav
  - [X] user auth (login )
    - [ ] register [ for admin only ]
  - [ ] user roles
  - [ ] user profile 
  - [ ] landing page
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
## issues
- [x] store user info and not to bring it with every request 
  -  bring user name only or access from $page var in svelte
- [x] change the res and routes
- [x] split users UIs
- [x] create user
- [ ] fix avatar store 
- [ ] fix profile auth 
