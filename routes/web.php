<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;

/*
|--------------------------------------------------------------------------
| FRONTEND (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalog', [ProductController::class, 'index'])
    ->name('catalog');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');


/*
|--------------------------------------------------------------------------
| TESTIMONIAL (PUBLIC)
|--------------------------------------------------------------------------
| ❗ HANYA POST → agar tidak kena Page Expired
*/
Route::post('/testimonial', [TestimonialController::class, 'store'])
    ->name('testimonial.store');


/*
|--------------------------------------------------------------------------
| ADMIN AREA (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Product Management
    Route::resource('products', AdminProduct::class);

    // Gallery Management
    Route::get('/gallery', [GalleryController::class, 'index'])
        ->name('admin.gallery');

    Route::post('/gallery', [GalleryController::class, 'store'])
        ->name('admin.gallery.store');

    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])
        ->name('admin.gallery.destroy');

    // Testimonial Management (ADMIN)
    Route::get('/testimonials', [TestimonialController::class, 'adminIndex'])
        ->name('admin.testimonials');

    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])
        ->name('admin.testimonials.destroy');

    // Hero
    Route::get('/hero', [HeroController::class, 'index'])
        ->name('admin.hero.index');

    Route::post('/hero/{id}', [HeroController::class, 'update'])
        ->name('admin.hero.update');

    // Settings
    Route::get('/settings', [SettingController::class, 'edit'])
        ->name('admin.settings');

    Route::post('/settings', [SettingController::class, 'update'])
        ->name('admin.settings.update');

    // About
    Route::get('/about', [AboutController::class, 'edit'])
        ->name('admin.about.edit');

    Route::post('/about', [AboutController::class, 'update'])
        ->name('admin.about.update');

    // Profile
    Route::get('/profile', [AdminProfile::class, 'edit'])
        ->name('admin.profile.edit');

    Route::post('/profile', [AdminProfile::class, 'update'])
        ->name('admin.profile.update');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
