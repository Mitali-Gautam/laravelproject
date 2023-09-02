<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

//Students CRUD
Route::get("/students",[StudentController::class,'index'])->name("students");
Route::get("/students/create",[StudentController::class,'create'])->name('students.create');
Route::post("/students/store",[StudentController::class,'store'])->name("students.store");
//Route::match(["get","post"],"/students/create",[StudentController::class,'create'])->name('students.create');
Route::get("/students/edit/{studentid}",[StudentController::class,'edit'])->name('students.edit');
Route::post("/students/update/{id}",[StudentController::class,'update'])->name('students.update');
Route::get("/students/delete/{id}",[StudentController::class,'delete'])->name('students.delete');
Route::get("/students/view/{id}",[StudentController::class,'view'])->name('students.view');


//Category CRUD
Route::get("/categories",[PublisherController::class,'index'])->name("categories");
Route::get("/categories/create",[PublisherController::class,'create'])->name('categories.create');
Route::post("/categories/store",[PublisherController::class,'store'])->name("categories.store");
Route::get("/categories/edit/{categoryId}",[PublisherController::class,'edit'])->name('categories.edit');
Route::post("/categories/update/{id}",[PublisherController::class,'update'])->name('categories.update');
Route::get("/categories/delete/{id}",[PublisherController::class,'delete'])->name('categories.delete');
Route::get("/categories/view/{id}",[PublisherController::class,'view'])->name('categories.view');
