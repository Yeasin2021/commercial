<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserAdmin\UserLoginController;
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
//     return view('admin.index');
// });

$router->get('/', [UserLoginController::class, 'userLoginForm'])->name('loginForm');
$router->post('/', [UserLoginController::class, 'userLogin'])->name('userLogin');


$router->get('/register', [UserLoginController::class, 'userRegister'])->name('register-form');
$router->post('/register', [UserLoginController::class, 'userRegisterStore'])->name('register-store');


Route::group(['middleware' => 'user'], function () {
    Route::get('/dashboard', [AdminController::class, 'indexDashborad'])->name('admin.dashboard');
    Route::get('/logout', [UserLoginController::class, 'userLogout'])->name('logout');
    Route::get('/user-profile-page', [AdminController::class, 'userProfileView'])->name('user.profile.view');

    Route::post('/profile-post',[AdminController::class,'userProfileStoreData'])->name('profile-post');
});
