<?php

use App\Http\Controllers\Admin\AdminMenu;
use App\Http\Controllers\Admin\LoginController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/admin/login', [LoginController::class, 'adminlogin'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'adminlogout'])->name('admin.logout');
//Route::post('/admin/menu/add', [AdminMenu::class, 'addmenu'])->name('add.menu');
// Route::middleware('auth:api')->group(function () {
//     Route::post('/admin/menu/add', [AdminMenu::class, 'addmenu'])->name('add.menu');
// });

Route::middleware(['auth:apiadmin'])->group(function () {
    Route::post('/admin/menu/add', [AdminMenu::class, 'addmenu'])->name('add.menu');
    Route::get('/admin/menu/get', [AdminMenu::class, 'getmenu'])->name('get.menu');
    Route::post('/admin/menu/update/{id}', [AdminMenu::class, 'updatemenu'])->name('update.menu');
});
