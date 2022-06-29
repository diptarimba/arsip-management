<?php

use App\Http\Controllers\Admin\CareerDevelopment\AwardController;
use App\Http\Controllers\Admin\CareerDevelopment\CompetencyDevelopmentController;
use App\Http\Controllers\Admin\CareerDevelopment\PromotionTransferController;
use App\Http\Controllers\Admin\Procurement\AppointmentController;
use App\Http\Controllers\Admin\Procurement\FormationController;
use App\Http\Controllers\Admin\Procurement\ReceptionController;
use App\Http\Controllers\Admin\Procurement\RefusalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


Route::group(['middleware' => ['auth', 'web']], function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/me', [LoginController::class, 'me'])->name('me');
    Route::post('/me', [LoginController::class, 'updateMe'])->name('me.update');
    Route::post('/admin', [RegisterController::class, 'addNewAdmin'])->name('admin.store');

    Route::resource('/carrer_development/award', AwardController::class);
    Route::resource('/career_development/competency_development', CompetencyDevelopmentController::class);
    Route::resource('/career_development/promotion_transfer', PromotionTransferController::class);

    Route::resource('/procurement/appointment', AppointmentController::class);
    Route::resource('/procurement/formation', FormationController::class);
    Route::resource('/procurement/reception', ReceptionController::class);
    Route::resource('/procurement/refusal', RefusalController::class);
});
