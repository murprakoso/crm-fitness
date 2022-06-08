<?php

use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
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
    return redirect('/login');
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::post('transaksi/perpanjang', [TransaksiController::class, 'perpanjang'])->name('transaksi.perpanjang');
    Route::resource('transaksi', TransaksiController::class);

    Route::get('member/select', [MemberController::class, 'select'])->name('member.select');
    Route::resource('member', MemberController::class);

    Route::get('harga/select', [HargaController::class, 'select'])->name('harga.select');
    Route::resource('harga', HargaController::class);

    Route::resource('pesan', PesanController::class);

    Route::get('device', [ProfileController::class, 'device'])->name('device.index');
    Route::put('device', [ProfileController::class, 'deviceUpdate'])->name('device.update');
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
});


// Route::get('/logintest', function () {
//     // return view('welcome');
//     return view('layouts.auth');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
