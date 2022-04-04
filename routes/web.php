<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Api testing route here

Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::post('articles', [ArticleController::class, 'store']);
Route::put('articles/{article}', [ArticleController::class, 'update']);
Route::delete('articles/{article}', [ArticleController::class, 'destroy']);


Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);

// Route::get('/students', [StudentController::class, 'index']);
// Route::post('/students', [StudentController::class, 'store']);
// Route::get('/fetch-students', [StudentController::class, 'fetchStudent']);
// Route::get('edit-student/{id}',[StudentController::class, 'edit']);
// Route::put('/update-student/{id}',[StudentController::class, 'update']);
// Route::delete('/delete-student/{id}',[StudentController::class, 'destroy']);
 
            //Student route here

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('fetch-students', [StudentController::class, 'fetchstudent']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);

        //Employee route here

Route::get('/employee', [EmployeeController::class, 'index']);


Route::post('/employee/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/employee/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/employee/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/employee/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/employee/update', [EmployeeController::class, 'update'])->name('update');




