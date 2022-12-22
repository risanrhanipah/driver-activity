<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PengajuanSPJController;
use App\Models\Attendance;
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

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [LoginController::class, 'admin'])->name('admin');
    Route::get('/user', [LoginController::class, 'user'])->name('user');
    Route::get('/driver', [LoginController::class, 'driver'])->name('driver');
    Route::get('/general_affair', [LoginController::class, 'general_affair'])->name('general_affair');
    Route::get('/history', [AttendanceController::class, 'history'])->name('attendance.history');
    Route::get('/history_spj', [PengajuanSPJController::class, 'history_spj'])->name('pengajuan.history_spj');
    Route::get('/pengajuan_spj', [PengajuanSPJController::class, 'index'])->name('pengajuan.spj');
    Route::get('/pengajuan_spj/create', [PengajuanSPJController::class, 'create'])->name('pengajuan_spj.create');
    Route::post('/pengajuan_spj/create', [PengajuanSPJController::class, 'store'])->name('pengajuan_spj.store');
    Route::get('/pengajuan_spj/show/{id}', [PengajuanSPJController::class, 'show'])->name('pengajuan_spj.show');
    Route::get('/pengajuan_spj/edit/{id}', [PengajuanSPJController::class, 'edit'])->name('pengajuan_spj.edit');
    Route::put('/pengajuan_spj/update/{id}', [PengajuanSPJController::class, 'update'])->name('pengajuan_spj.update');
    Route::get('/pengajuan_spj/export/{id}', [PengajuanSPJController::class, 'export'])->name('pengajuan_spj.export');
    Route::get('/attendance/timesheet', [AttendanceController::class, 'timesheet'])->name('attendance.timesheet');
    Route::resource('attendance', AttendanceController::class);
    Route::resource('employee', EmployeeController::class);
    Route::get('/report', [AttendanceController::class, 'report'])->name('report');
    Route::get('/report_attendance', [AttendanceController::class, 'report_attendance'])->name('attendance.report_attendance');
});