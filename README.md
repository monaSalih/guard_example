# using gard

I have create laravel project, in this project I create 2 sperates login page first login to check user and second one was for "client"


in the following I will mintion in the steps what I use:
1. I download following dependence:
 - composer require laravel/ui
 - php artisan ui:auth 
2. I migrate for all table and I added table client
3. create new middleware " php artisan make:middleware AdminMiddleware" and make the require update
4. declare new middleware in kernal and add new one "isAdmin"
5. create new controller for client login and user login
6. create new route for client login and user login

