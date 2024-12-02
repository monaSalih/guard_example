# using gard

I have create laravel project, in this project I create 2 sperates login page first login to check user and second one was for "client"


in the following I will mintion in the steps what I use:
1. I download following dependence:
 - composer require laravel/ui
 - php artisan ui:auth 
2. I migrate for all table and I added table client
3. create new middleware " php artisan make:middleware AdminMiddleware" and make the require update
4. declare new middleware in kernal and add declare one I called it "isAdmin"
5. create new controller for client login and user login
6. create new route for client login and user login
7. in web.php I declare route related for this new middleware like the following:
```
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
});
```
8.in controller I use the following code to check user is admin or not, and you can add your own logic here

----------------------------
## New Guard

1. I create new guard for client so I change the following code in `config/auth.php` to add new guard:
- add new guards as following
```

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'client' => [ // add new guard
            'driver' => 'session',
            'provider' => 'clients',
        ],
    ],
```

- add new provider as following
```
'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'clients' => [ // add new provider
            'driver' => 'eloquent',
            'model' => App\Models\Client::class,  
        ],]
```

