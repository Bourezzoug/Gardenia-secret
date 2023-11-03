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
use App\Http\Controllers\ClientOrders;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
use App\Models\BoxMoisSubscriber;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;
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
Route::get('/products',[EshopController::class,'index'])->name('e-shop.index');
Route::get('/product/{categorie}/{slug}/{id}',[ProductController::class,'index'])->name('product.customer.index');


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
        return view('client.testDashboard');
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
    // Route::get('/client/orders',\App\Http\Livewire\Client\Order\OrderIndex::class)->name('order.client.index');
    Route::get('/client/orders',[ClientOrders::class,'index'])->name('order.client.index');
    Route::get('/client/invoice/{id}',[ClientOrders::class,'invoice'])->name('order.invoice');
    Route::get('/client/invoicePDF/{id}',[ClientOrders::class,'printInvoicePdf'])->name('order.invoice.print');
    Route::get('/search-orders', [ClientOrders::class,'searchOrders']);

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
    Route::get('/admin/category',\App\Http\Livewire\Admin\Category\CategoryIndex::class)->name('category.index');
    Route::get('/admin/clients',\App\Http\Livewire\Admin\Client\ClientIndex::class)->name('client.index');
    Route::get('/admin/campagnes',\App\Http\Livewire\Admin\Campagne\CapmagneIndex::class)->name('campagne.index');
    Route::get('/admin/bannieres',\App\Http\Livewire\Admin\Banniere\BanniereIndex::class)->name('banniere.index');
    Route::get('/admin/printPDF/{itemId}', [printPdf::class, 'printPdf'])->name('admin.printPDF');
    Route::get('/admin/orders',\App\Http\Livewire\Admin\Order\OrderIndex::class)->name('order.index');
    Route::get('/admin/brands',\App\Http\Livewire\Admin\Brand\BrandIndex::class)->name('brand.index');
});
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

Route::get('/contact-us',[ContactController::class,'index'])->name('contact.index');
Route::get('/test-paypal',function() {
    return view('testpayment');
});
Route::post('/contact',[ContactController::class,'contact'])->name('contact.send');


Route::get('/blog',[MagController::class,'index'])->name('mag.index');
Route::get('/blog/{categorie}',[MagController::class,'categorie'])->name('blog.categorie');
Route::get('/blog/{categorie}/{slug}',[MagController::class,'show'])->name('mag.show');
// Route::get('/testShop',function() {
//     return view('pages.testShop');
// });

Route::post('/banner/{id}/click', function ($id) {
    $banner = DB::table('bannieres')->where('id', $id)->first();

    DB::table('bannieres')->where('id', $id)->increment('nb_total_click');

    $ip_address = request()->ip();
    $agent = new Agent();

    // Determine the device type
    $deviceType = $agent->deviceType();

    $unique_click = DB::table('banner_unique_clicks')
        ->where('banner_id', $id)
        ->where('ip_address', $ip_address)
        ->where('user_agent', $deviceType)
        ->first();

    if (!$unique_click) {
        DB::table('banner_unique_clicks')
            ->insert([
                'banner_id' => $id,
                'ip_address' => $ip_address,
                'user_agent' => $deviceType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('bannieres')
            ->where('id', $id)
            ->increment('nb_unique_click');
    }

    return redirect()->away($banner->lien);
})->name('banner.click');
Route::post('/banner/{id}/view', function ($id) {
    $banner = DB::table('bannieres')->where('id', $id)->first();

    $ip_address = request()->ip();
    $agent = new Agent();

    // Determine the device type
    $deviceType = $agent->deviceType();

    $unique_view = DB::table('banner_unique_views')
        ->where('banner_id', $id)
        ->where('ip_address', $ip_address)
        ->where('user_agent', $deviceType)
        ->first();

    if (!$unique_view) {
        DB::table('banner_unique_views')
            ->insert([
                'banner_id' => $id,
                'ip_address' => $ip_address,
                'user_agent' => $deviceType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('bannieres')
            ->where('id', $id)
            ->increment('nb_unique_vues');
    }

    DB::connection('second_mysql')
        ->table('bannieres')
        ->where('id', $id)
        ->increment('nb_total_vues');

    return response()->json(['success' => true]);
})->name('banner.view');


Route::get('/php-version', function () {
    return phpversion();
});

