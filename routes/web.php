<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\ChartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);
Route::get('/index.html', HomeComponent::class);
route::get('/shop', ShopComponent::class);
route::get('/cart', ChartComponent::class);
route::get('/checkout', CheckoutComponent::class);
Route::get('/products/{slug}', DetailsComponent::class)->name('product.details');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// For User
Route::middleware(['auth:sanctum', 'verified', ])->group(function()
{
    Route::get('/user/dasboard', UserDashboardComponent::class)->name('user.dashboard');
});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function()
{
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});

