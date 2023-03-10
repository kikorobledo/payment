<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WebhookController;

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

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('products/{product}/pay', [ProductsController::class, 'pay'])->middleware('auth')->name('products.pay');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('articles/{article}', [ArticleController::class, 'show'])->middleware(['subscription', 'auth'])->name('articles.show');

Route::get('billing', [BillingController::class, 'index'])->middleware('auth')->name('billing.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/user/invoice/{invoice}', function(Request $request, $invoiceId){

    return $request->user()->downloadInvoice($invoiceId, [
        'vendor' => 'InOut',
        'product' => 'Your Product',
    ]);

});

Route::post('/stripe/webhook', [WebhookController::class, 'handleWebhook']);
