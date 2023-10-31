<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserMangeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Hr\HrController;
use App\Http\Controllers\Admin\PortfolioController;
use Illuminate\Support\Facades\Auth;

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

//user route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'user'])->name('home');


//admin route
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [DashboardController::class, 'index']);
    // manage user
    Route::get('/user/manage', [UserMangeController::class, 'index'])->name('admin.manage.user');
    Route::get('/manage-role/{id}', [UserMangeController::class, 'manageRole'])->name('admin.manage.role');
    Route::post('/update-role', [UserMangeController::class, 'updateRole'])->name('admin.update.role');
    Route::get('/delete-user/{id}', [UserMangeController::class, 'deleteUser'])->name('admin.delete.user');

    // blog section start here
    Route::get('/blog/add', [BlogController::class, 'addBlog'])->name('admin.add.blog');
    Route::post('/blog/save', [BlogController::class, 'saveBlog'])->name('admin.blog.add');
    Route::get('/blog/manage', [BlogController::class, 'manageBlog'])->name('admin.manage.blog');
    Route::get('/blog/edit/{id}', [BlogController::class, 'editBlog'])->name('admin.edit.blog');
    Route::post('/blog/update', [BlogController::class, 'updateBlog'])->name('admin.blog.update');
    Route::get('/delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('admin.delete.blog');

    // portfolio section start here
    Route::get('/projects/add', [PortfolioController::class, 'addProjects'])->name('admin.add.projects');
    Route::post('/projects/save', [PortfolioController::class, 'saveProjects'])->name('admin.projects.add');
    Route::get('/projects/manage', [PortfolioController::class, 'manageProjects'])->name('admin.manage.projects');
    Route::get('/projects/edit/{id}', [PortfolioController::class, 'editProjects'])->name('admin.edit.projects');
    Route::post('/projects/update', [PortfolioController::class, 'updateProjects'])->name('admin.projects.update');
    Route::get('/delete-projects/{id}', [PortfolioController::class, 'deleteProjects'])->name('admin.delete.projects');

    // employee section start here
    Route::get('/employees/add', [EmployeeController::class, 'addEmployees'])->name('admin.add.employees');
});


//employee route
Route::prefix('employee')->middleware(['auth', 'employee'])->group(function () {

    Route::get('/dashboard', [EmployeeController::class, 'index']);
    // Route::get('/profile',[DashboardController::class,'index']);
});

//employee route
Route::prefix('hr')->middleware(['auth', 'hr'])->group(function () {

    Route::get('/dashboard', [HrController::class, 'index']);
    // Route::get('/profile',[DashboardController::class,'index']);
});
