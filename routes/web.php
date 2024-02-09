<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\StudentController;
use Inertia\Inertia;

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
Route::get('/',[HomeController::class,'index']);


Route::prefix('/student')->group(function (){
    Route::get('/',[StudentController::class,'index'])->name('student');
    Route::get('/list',[StudentController::class,'list'])->name('student.list');
    Route::get('/{id}/get',[StudentController::class,'get'])->name('student.get');
    Route::post('/store',[StudentController::class,'store'])->name('student.store');
    Route::get('/{id}/status',[StudentController::class,'status'])->name('student.status');
    Route::delete('/{id}/delete', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/{id}/update',[StudentController::class,'update'])->name('student.update');
    Route::post('/student/upload-image', [StudentController::class, 'uploadImage'])->name('student.uploadImage');
});

//
//Route::get('/', function () {
//    return Inertia::render('Dineth', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
