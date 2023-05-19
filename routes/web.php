<?php
//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|

Route::get('/',[\App\Http\Controllers\Controller::class,'index'])->name('index');
Route::get('/catalog/{category_id}/products',[App\Http\Controllers\Controller::class,'products'])->name('catalog.products');
Route::get('/product/show/{id}',[App\Http\Controllers\Controller::class,'product'])->name('catalog.product');
//
///*
// * Корзина покупателя
// */
Route::group([
    'as' => 'basket.', // имя маршрута, например basket.index
    'prefix' => 'basket',// префикс маршрута, например basket/index
    'middleware' => 'auth'
], function () {
    // список всех товаров в корзине
    Route::get('index', [App\Http\Controllers\BasketController::class,'index'])
        ->name('index');
    // страница после успешного сохранения заказа в БД
    Route::get('success', [App\Http\Controllers\BasketController::class,'success'])
        ->name('success');
    // отправка формы добавления товара в корзину
    Route::post('add/{id}',[App\Http\Controllers\BasketController::class,'add'])
        ->where('id', '[0-9]+')
        ->name('add');
    // отправка формы изменения кол-ва отдельного товара в корзине
    Route::post('plus/{id}', [App\Http\Controllers\BasketController::class,'plus'])
        ->where('id', '[0-9]+')
        ->name('plus');
    // отправка формы изменения кол-ва отдельного товара в корзине
    Route::post('minus/{id}', [App\Http\Controllers\BasketController::class,'minus'])
        ->where('id', '[0-9]+')
        ->name('minus');
    // отправка формы удаления отдельного товара из корзины
    Route::post('remove/{id}', [App\Http\Controllers\BasketController::class,'remove'])
        ->where('id', '[0-9]+')
        ->name('remove');
    // отправка формы для удаления всех товаров из корзины
    Route::post('clear', [App\Http\Controllers\BasketController::class,'clear'])
        ->name('clear');
});
//
///*
// * Регистрация, вход в ЛК, восстановление пароля
// */
Route::name('user.')->prefix('user')->group(function () {
    Auth::routes();
});
// * Панель управления магазином для администратора сайта
Route::group([
    'as' => 'admin.', // имя маршрута, например admin.index
    'prefix' => 'admin', // префикс маршрута, например admin/index
    'namespace' => 'Admin', // пространство имен контроллера
    'middleware' => ['auth', 'admin'] // один или несколько посредников
], function () {
    // главная страница панели управления
    Route::get('index', [App\Http\Controllers\Admin\IndexController::class,'index'])->name('index');
    // CRUD-операции над категориями каталога
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category.index');
    Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class,'create'])->name('category.create');
    Route::get('category/show/{category}', [App\Http\Controllers\Admin\CategoryController::class,'show'])->name('category.show');
    Route::get('category/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
    Route::delete('category/destroy/{category}', [App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.destroy');
    Route::post('category/create/', [App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');
    Route::put('category/update/{category}', [App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');


    // CRUD-операции над товарами каталога
    Route::get('product', [App\Http\Controllers\Admin\ProductController::class,'index'])->name('product.index');
    Route::get('product/create', [App\Http\Controllers\Admin\ProductController::class,'create'])->name('product.create');
    Route::get('product/show/{product}', [App\Http\Controllers\Admin\ProductController::class,'show'])->name('product.show');
    Route::get('product/edit/{product}', [App\Http\Controllers\Admin\ProductController::class,'edit'])->name('product.edit');
    Route::delete('product/destroy/{product}', [App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('product.destroy');
    Route::post('product/create/', [App\Http\Controllers\Admin\ProductController::class,'store'])->name('product.store');
    Route::put('product/update/{product}', [App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
