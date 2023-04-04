<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserNoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCreateController;
use App\Http\Controllers\CompanyCreateController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/open', [SaleController::class, 'open'])->name('sale.open');
Route::get('/company/{id}', [SaleController::class, 'show'])->name('company');
Route::post('/like', [SaleController::class, 'like'])->name('like');
Route::get('/like', [SaleController::class, 'favorite'])->name('sale.like');
Route::post('/dislike', [SaleController::class, 'dislike'])->name('dislike');
Route::post('/user_note/store', [UserNoteController::class, 'store'])->name('user_note.store');
Route::get('/user_note/{company_id}', [UserNoteController::class, 'index'])->name('user_notes.index');

// plans
Route::get('/plans', [PlansController::class, 'index'])->name('plans.index');
Route::post('plans', [PlanController::class,'store'])->name('plans.store');
Route::get('/edit_plan/{id}',[PlansController::class,'edit'])->name('sales.edit_plan');
Route::put('/plans/{id}',[PlansController::class,'update'])->name('plans.update');
Route::delete('/plans/{id}',[PlansController::class,'destroy'])->name('plans.destroy');
Route::get('/plans/create', [PlansController::class, 'create'])->name('plans.create');
Route::resource('plans', PlansController::class);
Route::get('/pagination/ajax', [PlansController::class, 'ajaxPagination'])->name('ajax.pagination');
// Route::get('/savecheckbox/check', [PlansController::class, 'ajax']);
// Route::post('/savecheckbox/check', [PlansController::class, 'ajax']);



// pdf
Route::get('/download-pdf/{company_id}', [PdfController::class,'downloadPdf'])->name('download-pdf');
Route::get('/pdf/company', [PdfController::class,'view'])->name('dango');

// admin routes(company)
Route::get('/admin/company_list', [CompanyCreateController::class, 'open'])->name('admin.company_list');
Route::delete('/admin/company_list/{id}',[CompanyCreateController::class,'destroy'])->name('company_list.destroy');
Route::get('/admin/company_create', [CompanyCreateController::class, 'create'])->name('company.create');
Route::post('/admin/company_create', [CompanyCreateController::class, 'store'])->name('company.store');
Route::get('/admin/company_edit/{id}',[CompanyCreateController::class,'edit'])->name('company.edit');
Route::put('/admin/company_edit/{id}',[CompanyCreateController::class,'update'])->name('company.update');

// admin routes(user)
Route::get('/admin/user_list', [UserCreateController::class, 'open'])->name('admin.user_list');
Route::delete('/admin/user_list/{id}',[UserCreateController::class,'destroy'])->name('user.destroy');
Route::get('/admin/user_create', [UserCreateController::class, 'create'])->name('admin.user_create');
Route::post('/admin/user_create', [UserCreateController::class, 'store'])->name('user.store');
Route::get('/admin/user_edit/{id}',[UserCreateController::class,'edit'])->name('user.edit');
Route::put('/admin/user_edit/{id}',[UserCreateController::class,'update'])->name('user.update');

require __DIR__.'/auth.php';
