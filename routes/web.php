<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PublicUserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicWebsite\AuthController;
use App\Http\Controllers\PublicWebsite\CartController;
use App\Http\Controllers\PublicWebsite\CheckoutController;
use App\Http\Controllers\PublicWebsite\HomeController;
use App\Http\Controllers\PublicWebsite\PublicDashboardController;
use App\Http\Controllers\PublicWebsite\ReviewController;
use App\Http\Controllers\PublicWebsite\SubscriberController;
use App\Http\Controllers\PublicWebsite\WishlistController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/about', [HomeController::class, "goToAbout"])->name('about');
Route::get('/contact', [HomeController::class, "goToContact"])->name('contact');
Route::get('/specialties', [HomeController::class, "goToSpecialties"])->name('specialties');
Route::get('/services', [HomeController::class, "goToServices"])->name('services');
Route::get('/gallery', [HomeController::class, "goToGallery"])->name('gallery');
Route::get('/shop-view', [HomeController::class, "goToShop"])->name('shop.page');
Route::get('/return-policy', [HomeController::class, "goToReturnPolicy"])->name('return.policy');
Route::get('/privacy-policy', [HomeController::class, "goPrivacyPolicy"])->name('privacy.policy');
Route::get('/terms-conditions', [HomeController::class, "goToTermsConditions"])->name('terms.conditions');
Route::get('/products/by-category/{id}', [HomeController::class, 'getByCategory']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('user')->group(function () {
    Route::get('/login', [HomeController::class, 'publicLoginPage'])->name('user.login');
    Route::post('/login/submit', [AuthController::class, 'AuthLogin'])->name('auth.login');
    Route::get('/register', [HomeController::class, 'publicRegisterPage'])->name('user.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('user.verify');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [PublicDashboardController::class, 'publicDashboard'])->name('user.dashboard');
    Route::post('/update-profile', [PublicDashboardController::class, 'updateProfile'])->name('user.update.profile');
    Route::post('/update-password', [PublicDashboardController::class, 'updatePassword'])->name('user.update.password');

    Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
    Route::post('/address/update', [AddressController::class, 'update'])->name('address.update');
    Route::delete('/address/delete/{id}', [AddressController::class, 'destroy'])->name('address.delete');
});

Route::prefix('wishlist')->group(function () {
    Route::get('/', [WishlistController::class, "goToWishlist"])->name('wishlist');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::post('/cart/add', [CartController::class, 'add'])->name('wishlist.cart.add');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/quantity/add', [CartController::class, 'addQuantity'])->name('cart.quantity.add');
    Route::post('/add/view', [CartController::class, 'addFromView'])->name('cart.from.view');
    Route::put('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/store', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/payment/success', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [CheckoutController::class, 'paymentCancel'])->name('payment.cancel');
});

Route::prefix('shop')->group(function () {
    Route::get('/', [HomeController::class, 'goToProducts'])->name('shop.index');
    Route::get('/product/quick-view/{id}', [HomeController::class, 'quickView'])->name('product.quickview');
    Route::post('/{product}/reviews', [ReviewController::class, 'store'])->name('product.review.store');
});

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return redirect()->route('login');
    });

    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/task', [DashboardController::class, "task"])->name('task');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, "index"])->name('products.index');
        Route::get('/all', [ProductController::class, "all"])->name('products.all');
        Route::get('/create', [ProductController::class, "create"])->name('products.create');
        Route::post('/store', [ProductController::class, "store"])->name('product.store');
        Route::get('/{id}/get', [ProductController::class, "get"])->name('product.get');
        Route::get('/{id}/status', [ProductController::class, "changeStatus"])->name('product.status');
        Route::get('/{id}/edit', [ProductController::class, "edit"])->name('product.edit');
        Route::post('/{id}/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('/{id}/reviews', [ProductController::class, "reviews"])->name('product.reviews');
        Route::get('/{id}/reviews/all', [ProductController::class, "allReviews"])->name('products.reviews.all');
        Route::delete('/{id}/review/destroy', [ProductController::class, 'reviewDestroy'])->name('review.destroy');
        Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::post('/{id}/stock/update', [ProductController::class, "stockUpdate"])->name('stock.update');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, "index"])->name('orders.index');
        Route::get('/all', [OrderController::class, "all"])->name('orders.all');
        Route::get('/view/{id}', [OrderController::class, "view"])->name('order.view');
        Route::put('/status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, "index"])->name('users.index');
        Route::get('/all', [UserController::class, "all"])->name('users.all');
        Route::post('/store', [UserController::class, "store"])->name('user.store');
        Route::get('/{id}/status', [UserController::class, "changeStatus"])->name('user.status');
        Route::delete('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('public_users')->group(function () {
        Route::get('/', [PublicUserController::class, "index"])->name('public-users.index');
        Route::get('/all', [PublicUserController::class, "all"])->name('public-users.all');
        Route::get('/{id}/status', [PublicUserController::class, "changeStatus"])->name('public-user.status');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, "index"])->name('settings.index');

        Route::prefix('categories')->group(function () {
            Route::get('/all', [CategoryController::class, "all"])->name('categories.all');
            Route::post('/store', [CategoryController::class, "store"])->name('category.store');
            Route::get('/{id}/edit', [CategoryController::class, "edit"])->name('category.edit');
            Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
        });

        Route::prefix('brands')->group(function () {
            Route::get('/{category_id}/all', [BrandController::class, "all"])->name('brands.all');
            Route::post('/{category}/store', [BrandController::class, 'store'])->name('brand.store');
            Route::delete('/{category}/{brand}/destroy', [BrandController::class, 'detach'])->name('brand.destroy');
        });
    });
});
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);

        return response()->json([
            'status' => 'success',
            'message' => 'Migrations and seeders ran successfully.',
            'output' => Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

require __DIR__ . '/auth.php';
