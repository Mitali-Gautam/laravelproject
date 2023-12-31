<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

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


//Publishers CRUD
Route::get("/publishers",[PublisherController::class,'index'])->name("publishers");
Route::get("/publishers/create",[PublisherController::class,'create'])->name('publishers.create');
Route::post("/publishers/store",[PublisherController::class,'store'])->name("publishers.store");
Route::get("/publishers/edit/{studentid}",[PublisherController::class,'edit'])->name('publishers.edit');
Route::post("/publishers/update/{id}",[PublisherController::class,'update'])->name('publishers.update');
Route::get("/publishers/delete/{id}",[PublisherController::class,'delete'])->name('publishers.delete');
Route::get("/publishers/view/{id}",[PublisherController::class,'view'])->name('publishers.view');

//Category CRUD
Route::get("/categories",[CategoryController::class,'index'])->name("categories");
Route::get("/categories/create",[CategoryController::class,'create'])->name('categories.create');
Route::post("/categories/store",[CategoryController::class,'store'])->name("categories.store");
Route::get("/categories/edit/{categoryId}",[CategoryController::class,'edit'])->name('categories.edit');
Route::post("/categories/update/{id}",[CategoryController::class,'update'])->name('categories.update');
Route::get("/categories/delete/{id}",[CategoryController::class,'delete'])->name('categories.delete');
Route::get("/categories/view/{id}",[CategoryController::class,'view'])->name('categories.view');

//Author CRUD
Route::get("/authors",[AuthorController::class,'index'])->name("authors");
Route::get("/authors/create",[AuthorController::class,'create'])->name('authors.create');
Route::post("/authors/store",[AuthorController::class,'store'])->name("authors.store");
Route::get("/authors/edit/{id}",[AuthorController::class,'edit'])->name('authors.edit');
Route::post("/authors/update/{id}",[AuthorController::class,'update'])->name('authors.update');
Route::get("/authors/delete/{id}",[AuthorController::class,'delete'])->name('authors.delete');
Route::get("/authors/view/{id}",[AuthorController::class,'view'])->name('authors.view');
