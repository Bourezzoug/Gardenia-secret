<?php

use App\Http\Controllers\BoxMoisSubscriberController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EshopController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
use App\Models\BoxMoisSubscriber;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('comingsoon');
});
Route::get('/', function () {
    return view('comingsoon');
});
// Route::get('/test', function () {
//     return view('homepage');
// });
Route::get('/test',[HomeController::class,'index'])->name('home.test');
Route::post('/test',[HomeController::class,'store'])->name('email.store');
Route::get('/e-shop',[EshopController::class,'index'])->name('e-shop.index');
Route::get('/produit/{id}',[ProductController::class,'index'])->name('product.index');


Route::get('/quiz',function() {
    return view('pages.quiz');
})->name('quiz.index');



Route::get('/formulaire', function () {
    return view('formulaire');
})->name('formulaire');
Route::post('/', [FormulaireController::class,'store'])->name('sondage.store');


// Route for customers
Route::middleware(['auth:sanctum', 'verified','authcustomer'])->group(function () {
    Route::get('/client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');
    Route::post('/produit_cart/{id}',[ProductController::class,'cart_store'])->name('cart.store');
    Route::post('/produit_wishlist/{id}',[ProductController::class,'wishlist_store'])->name('wishlist.store');
    Route::post('/product_wishlist_to_cart/{id}/{wishlist_id}',[ProductController::class,'wishlist_store_to_cart'])->name('wishlist.store_cart');
    // Route::post('/produit/{id}',[ProductController::class,'wishlist'])->name('product.wishlist');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::delete('/wishlist/{id}', [ProductController::class, 'delete_wishlist'])->name('wishlist.delete');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::post('/store_box_to_cart/{id}',[BoxController::class,'store_box_to_cart'])->name('box_to_cart.store');
    Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal');
    Route::get('paypal/success',[PaypalController::class,'success'])->name('paypal_success');
    Route::get('paypal/cancel',[PaypalController::class,'cancel'])->name('paypal_cancel');
    Route::post('stripe/payment',[StripeController::class,'payment'])->name('stripe');
    Route::get('stripe/success',[StripeController::class,'success'])->name('stripe_success');
    Route::get('stripe/cancel',[StripeController::class,'cancel'])->name('stripe_cancel');
    Route::post('confirm_order',[OrderController::class,'confirm_order'])->name('confirm_order');
    // routes/web.php

Route::post('/stripe/webhook', 'StripeController@handleWebhook');

});
// Route for Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/admin/blog',\App\Http\Livewire\Admin\Blog\BlogIndex::class)->name('blog.index');
    Route::get('/admin/blog/create',\App\Http\Livewire\Admin\Blog\BlogCreate::class)->name('blog.create');
    Route::get('/admin/product',\App\Http\Livewire\Admin\Product\ProductIndex::class)->name('product.index');
    Route::get('/admin/product/create',\App\Http\Livewire\Admin\Product\ProductCreate::class)->name('product.create');
    Route::get('/admin/inscrit',\App\Http\Livewire\Admin\Inscrit\InscritIndex::class)->name('inscrit.index');
    Route::get('/admin/box',\App\Http\Livewire\Admin\Box\BoxIndex::class)->name('box.index');
    Route::get('/admin/box/create',\App\Http\Livewire\Admin\Box\BoxCreate::class)->name('box.create');
    Route::get('/admin/box/update/{id}',\App\Http\Livewire\Admin\Box\BoxUpdate::class)->name('box.update');
});;
// Route::get('/symlink', function () {
//   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
//   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
//   symlink($target, $link);
//   echo "Done";
// });
Route::get('/box-du-mois',function() {
    return view('pages.inscrits');
});
Route::post('/box-du-mois',[BoxMoisSubscriberController::class,'store'])->name('inscrits.store');
Route::get('/box-subscription',[BoxController::class,'index'])->name('BoxMois.index');
Route::get('/blog',[MagController::class,'index'])->name('mag.index');
Route::get('/blog?categorie={categorie}',[MagController::class,'categorie'])->name('blog.categorie');
Route::get('/blog/{slug}',[MagController::class,'show'])->name('mag.show');
Route::get('/contact-us',[ContactController::class,'index'])->name('contact.index');
Route::get('/test-paypal',function() {
    return view('testpayment');
});
Route::post('/contact',[ContactController::class,'contact'])->name('contact.send');
