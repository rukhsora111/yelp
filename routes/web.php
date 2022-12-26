<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\FrontController;




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
Route::get('/teaching', [TeachingController::class, 'open_teaching'])->name('teaching');

Route::get('/we-practice', [TeachingController::class, 'do_some_practice'])->name('practice');

Route::get('/',[FrontController::class, 'landing'])->name('landing');

Route::get('/app/organisations',[FrontController::class, 'index_organisation'])->name('app.organisations');

Route::get('/app/organisations/{id}',[FrontController::class, 'page_organisation'])->name('app.organisations.page');

Route::post('/app/organisations/{id}/comment',[OrganisationController::class, 'add_comment'])->name('app.organisations.comment');


Route::get('/organisation',[OrganisationController::class, 'index'])->name('organisation');
Route::put(
    'organisation/edit/{id}',
    [OrganisationController::class, 'edit']
 )->name('organisation.edit');

 Route::delete(
    'organisation/{id}',
    [OrganisationController::class, 'destroy']
 )->name('organisation.delete'); 	

 Route::post(
    'organisation',
    [OrganisationController::class, 'store']
 )->name('organisation.store');

 Route::patch(
    'organisation/attach_category/{id}',
    [OrganisationController::class, 'attach_category']
 )->name('organisation.attach_category');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
