<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\WaiterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
route::get('/add_food',[AdminController::class,'add_food']);
Route::get('/view_food', [AdminController::class, 'view_food']);

Route::get('/delete_food/{id}', [AdminController::class, 'delete_food']);


Route::get('/update_food/{id}', [AdminController::class, 'update_food']);

Route::post('/edit_food/{id}', [AdminController::class, 'edit_food']);


route::get('/home',[HomeController::class,'index']);


route::get('/',[HomeController::class,'my_home']);
route::post('/upload_food',[AdminController::class,'upload_food']);
route::get('/view_food',[AdminController::class,'view_food']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

Route::get('/my_cart/{id}', [HomeController::class, 'my_cart'])->name('my_cart');

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::post('/confirm_order', [HomeController::class, 'confirm_order'])->name('confirm_order');

Route::get('/orders', [AdminController::class, 'orders']);


Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way']);

Route::get('delivered/{id}', [AdminController::class, 'delivered']);

Route::get('canceled/{id}', [AdminController::class, 'canceled']);

Route::post('/book_table', [HomeController::class, 'book_table']);

Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth', 'admin'])->group(function () {


    Route::get('/admin/add_chef', [AdminController::class, 'addChefForm'])->name('add_chef');
    Route::post('/admin/add_chef', [AdminController::class, 'storeChef'])->name('store_chef');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/add_waiter', [AdminController::class, 'addWaiterForm'])->name('add_waiter');
    Route::post('/admin/add_waiter', [AdminController::class, 'storeWaiter'])->name('store_waiter');
});


Route::get('/chef/login', [ChefController::class, 'loginForm'])->name('chef.login');
Route::post('/chef/login', [ChefController::class, 'login'])->name('chef.login.submit');


Route::middleware('auth:chef')->group(function () {
    Route::get('/chef/dashboard', function () {
        return view('chef.dashboard');
    });
});

Route::middleware('auth:waiter')->group(function () {
    Route::get('/waiter/dashboard', [WaiterController::class, 'dashboard']);
});





