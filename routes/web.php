<?php

use App\Http\Controllers\{PayinController,BannerController,PlayerController,SettingController,DashboardController,RoleController,AdminController,CardfiveController,OrderPlaceController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'Dashboard'])
        ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    Route::middleware('auth')->group(function () {
    Route::controller(PlayerController::class)->group(function () {
        Route::get('/player-index','PlayerIndex')->name('player.index');
        Route::Post('/player-walletAdd-{id}','PlayerWalletAdd')->name('playerWallet.add');
        Route::Post('/player-walletSub-{id}','PlayerWalletSub')->name('playerWallet.sub');
        Route::get('/player-active-{id}','PlayerActive')->name('playerActive');
        Route::get('/player-inactive-{id}','PlayerInactive')->name('playerInactive');
        Route::get('/player-details-{userId}','PlayerDetails')->name('Player.details');
    
    });
    
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner-index','BannerIndex')->name('banner.index');
        Route::post('/banner-store','BannerStore')->name('banner.store');
        Route::get('/banner-active-{id}','BannerActive')->name('banner.active');
        Route::get('/banner-inactive-{id}','BannerInactive')->name('banner.inactive');
        Route::delete('/banner-destroy-{id}','BannerDestroy')->name('banner.destroy');

    });
    
    Route::controller(PayinController::class)->group(function () {
        Route::get('/payin-index','PayinIndex')->name('payin.index');


    });
    
     Route::controller(OrderPlaceController::class)->group(function () {
        Route::get('/order-index','OrderIndex')->name('order.index');


    });
    
    Route::controller(SettingController::class)->group(function () {
        
        Route::get('/site-content-{slug}','SiteContents')->name('site.content');
        

    });
});



    Route::middleware('auth')->group(function () {
 
    
    Route::resource('roles', RoleController::class)->names([
    'index' => 'roles.index',
    'create' => 'roles.create',
    'store' => 'roles.store',
    'show' => 'roles.show',
    'edit' => 'roles.edit',
    'update' => 'roles.update',
    'destroy' => 'roles.destroy',
]);


});


require __DIR__.'/auth.php';
