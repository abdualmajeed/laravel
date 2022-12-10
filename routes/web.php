<?php

use App\Http\Controllers\Dashboard\EmployeesController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\TasksController;
use App\Http\Controllers\Dashboard\UsersController;
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
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get("/", [HomeController::class, 'index'])->name('home');
        Route::get("/users", [UsersController::class, 'index'])->name('users');
        Route::get("/users/add", [UsersController::class, 'add'])->name('addUser');
        Route::post("/users/store", [UsersController::class, 'store'])->name('StoreUser');
        Route::get("/tasks", [TasksController::class, 'index'])->name('tasks');
        Route::get("/tasks/add", [TasksController::class, 'add'])->name('addTask');
        Route::post("/tasks/store", [TasksController::class, 'store'])->name('storeTask');
        Route::get("/tasks/edit", [TasksController::class, 'edit'])->name('editTask');
        Route::get("/tasks/update", [TasksController::class, 'update'])->name('updateTask');
        Route::get("/tasks/task_users", [TasksController::class, 'taskUsers'])->name('task_users');
        Route::get("/tasks/status_task/{id}", [TasksController::class, 'active'])->name('status_task');
        Route::resource('task', TasksController::class);
        Route::resource('user', UsersController::class);
    });
    Route::group(['middleware' => ['role:client']], function () {
        Route::get("/employee", [EmployeesController::class, 'index'])->name('employee');
        Route::get("/profile", [EmployeesController::class, 'index'])->name('profile');
        Route::get("/complate/{id}", [EmployeesController::class, 'complate'])->name('complated');
    });
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/saveLogin', [LoginController::class, 'login'])->name('saveLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


