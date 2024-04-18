<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;
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

// GET Request
Route::get('/',[UserController::class,'view_login'])->name('user-login');
Route::get('signup',[UserController::class,'view_signup'])->name('user-signup');
// For Route Chache Clearing
Route::get('optimize', function() {
    Artisan::call('optimize');
    echo "optimize";
})->name('optimize');
Route::get('route-clear', function() {
    Artisan::call('route:clear');
    echo "Route Cache is cleared";
})->name('route-clear');

Route::get('print', function() {
    echo "HELLO ANAND BAIRAGI";
})->name('print-this');

Route::middleware(['webGuard'])->group(function() {
    Route::get('dashboard',[UserController::class,'dashboard'])->name('user-dashboard');

    // Pre Defined Boards
    Route::get('defined-fifth-and-sixth-grade',[UserController::class,'defined_fift_sixth'])->name('defined-fifth-sixth');
    Route::get('defined-third-and-fourth-grade',[UserController::class,'defined_third_fourth'])->name('defined-third-fourth');
    Route::get('defined-first-and-second',[UserController::class,'defined_first_second'])->name('defined-first-second');
    Route::get('defined-kinder-garten',[UserController::class,'defined_kinder_garten'])->name('defined-kinder-garden');
    // Customizable Boards
    Route::get('fifth-and-sixth-grade',[UserController::class,'fift_sixth'])->name('fifth-sixth');
    Route::get('third-and-fourth-grade',[UserController::class,'third_fourth'])->name('third-fourth');
    Route::get('first-and-second',[UserController::class,'first_second'])->name('first-second');
    Route::get('kinder-garten',[UserController::class,'kinder_garten'])->name('kinder-garden');

    Route::get('select-grade',[UserController::class,'select_grade']);

    Route::get('thankyou',[UserController::class,'thankYou'])->name('thankyou');

    Route::get('saving-draft/{grade_id}', [UserController::class, 'save_draft'])->name('save-draft');
    Route::get('show-draft/{draft_id}/{grade_id}', [UserController::class, 'show_draft'])->name('show-draft');
    Route::get('remove-draft/{draft_id}', [UserController::class, 'remove_draft'])->name('remove-draft');
    Route::get('my-drafts', [UserController::class, 'my_drafts'])->name('my-drafts');
    Route::get('custom-parameters', [UserController::class, 'custom_parameters'])->name('custom-parameters');
    Route::get('enquiry-form/{draft_id}', [UserController::class, 'send_enquiry'])->name('send-enquiry');

    Route::get('logout', [UserController::class, 'logout'])->name('user-logout');
});

// POST Request
Route::post('signup', [UserController::class, 'signup'])->name('user-signup-post');
Route::post('login', [UserController::class, 'login'])->name('user-login-post');

Route::middleware(['webGuard'])->group(function () {
    Route::post('show-grade-board',[UserController::class,'show_grade_board'])->name('show-grade-board');
    Route::post('saving-element', [UserController::class, 'save_element'])->name('save-element');
    Route::post('draft-updated', [UserController::class, 'update_draft'])->name('update-draft');
    Route::post('draft-updated', [UserController::class, 'update_draft'])->name('update-draft');
    Route::post('save-enquiry', [UserController::class, 'save_enquiry'])->name('save-enquiry');
});



/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
*/
// GET
Route::get('admin-login', [AdminController::class, 'show_login'])->name('admin-show-login');
Route::middleware(['adminGuard'])->group(function () {
    Route::get('admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin-dashboard');
    Route::get('enquiries', [AdminController::class, 'show_enquiries'])->name('show-enquiries');
    Route::get('draft/{draft_id}/{grade_id}', [AdminController::class, 'show_draft'])->name('admin-show-draft');
    Route::get('client-details/{id}', [AdminController::class, 'client_details'])->name('client-details');
    Route::get('admin-logout', [AdminController::class, 'logout'])->name('admin-logout');
});

// POST 
Route::post('admin-login', [AdminController::class, 'login'])->name('admin-login');