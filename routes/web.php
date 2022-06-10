<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        $users = User::latest()->paginate('2');
        return view('dashboard', compact('users'));
    })->name('dashboard');


    //  --- CATEGORY SECTION ---
    Route::get('/all/categories', [CategoryController::class, 'index'])->name("all.category");

    Route::post('/add/category', [CategoryController::class, 'store'])->name("store.category");
    Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name("edit.category");
    Route::post('/update/category/{id}', [CategoryController::class, 'update'])->name("update.category");

    Route::get('/delete/category/{id}', [CategoryController::class, 'softDelete'])->name("softdeleted.category");

    Route::get('/restore/category/{id}', [CategoryController::class, 'restore'])->name("restore.category");

    Route::get('/delete/category/permanent/{id}', [CategoryController::class, 'destroy'])->name("permanent.delete.category");

    // --- CATEGORY SECTION ENDS ----

    // --- BRAND SECTION STARTS ---
    Route::get('/all/brands', [BrandController::class, 'index'])->name("all.brand");
    Route::get('/add/brands', [BrandController::class, 'create'])->name("add.brand");
    Route::post('/create/brands', [BrandController::class, 'saveBrand'])->name("save.brand");



});
