<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


// Email verification route
Route::get('/email/verify', function(){
    return view('auth.verify-email');

})->middleware(['auth'])->name('verification.notice');



// Home page route
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
        return view('admin.index', compact('users'));
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
    Route::get('/view/brand/{id}', [BrandController::class, 'viewBrand'])->name("view.brand");
    Route::post('/create/brands', [BrandController::class, 'saveBrand'])->name("save.brand");
    Route::get('/edit/brands/{id}', [BrandController::class, 'editBrand'])->name("edit.brand");
    Route::post('/update/brands/{id}', [BrandController::class, 'updateBrand'])->name("update.brand");
    Route::get('/delete/brands/{id}', [BrandController::class, 'deleteBrand'])->name("delete.brand");


    Route::get('/restore/deleted/brands/{id}', [BrandController::class, 'restoreDeleteBrand'])->name("restore.deleted.brand");
    
    Route::get('/permanent/delete/brand/{id}', [BrandController::class, 'permanentDeleteBrand'])->name("permanent.delete.brand");


    // mutli image Route
    Route::get('/multi-image-uploads/', [BrandController::class, 'multiImage'])->name('multi.image');
    Route::post('/save-multi-images/', [BrandController::class, 'saveImages'])->name('store.images');
    Route::get('/edit-multi-image/{id}', [BrandController::class, 'editImages'])->name('edit.images');
    Route::post('/update-multi-image/{id}', [BrandController::class, 'updateImages'])->name('update.images');
    Route::get('/delete-multi-image/{id}', [BrandController::class, 'deleteImages'])->name('delete.images');




    // site setting route
    Route::get('/site-setting/', [SettingController::class, 'index'])->name('site.setting');

    Route::post('/update-setting/{id}', [SettingController::class, 'update'])->name('update.setting');


    //logout route 
    Route::get('/user/logout', [BrandController::class, 'userLogout'])->name('user.logout');




});
