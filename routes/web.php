<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PengajuanSPJController;
use App\Models\PengajuanSPJ;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [LoginController::class, 'admin'])->name('admin');
    Route::get('/user', [LoginController::class, 'user'])->name('user');
    Route::get('/history', [AttendanceController::class, 'history'])->name('attendance.history');
    Route::resource('attendance', AttendanceController::class);
    Route::resource('pengajuan_spj', PengajuanSPJController::class);
    Route::resource('employee', EmployeeController::class);
});

Auth::routes();
