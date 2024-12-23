<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\CustomRegisterController;

use App\Http\Controllers\TestPlanController;
use App\Http\Controllers\TestPlanRowController;



Route::get('/testplans/{id}/edit', [TestPlanController::class, 'edit'])->name('testplans.edit');
Route::put('/testplans/{id}', [TestPlanController::class, 'update'])->name('testplans.update');


Route::resource('test-plan-rows', TestPlanRowController::class);
Route::resource('test-plans', TestPlanController::class);
// Route::delete('/employee/{id}', [TestPlanController::class, 'destroy'])->name('employee.destroy');


Route::get('/tests', [TestPlanController::class, 'index'])->name('test-plans.index');

// Route::get('/test-plans', [TestPlanController::class, 'index'])->name('test-plans.index');
Route::post('/test-plans', [TestPlanController::class, 'store'])->name('test-plans.store');


Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

// web.php
Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');


Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/welcome', function () {
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

//===========================================================================
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

//===========================================================================
// Route::middleware(['auth', 'role:agent'])->group(function(){
//     Route::get('/allTests', [EmployeeController::class, 'allTests'])->name('allTests');
// });


//============================CustomRegister===============================================
Route::middleware('auth')->group(function () {
    Route::get('/material', function () {
        return view('pages.material');
    })->name('material');
});


//===========================================================================

Route::get('/home', function () {
    return view('pages.index');
})->middleware(['auth', 'verified'])->name('Home');

Route::get('/allTests', function () {
    return view('pages.allTests');
})->middleware(['auth', 'role:admin'])->name('allTests');



Route::get('/admin', function () {
    return view('pages.admin');
})->name('admin');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::resource("/employee", EmployeeController::class);

// routes/web.php


Route::get('/rig-status', function () {
    return view('rig-status');
});

use App\Http\Controllers\YourController;

Route::get('/dynamic-tables', [EmployeeController::class, 'showDynamicTables'])->name('dynamic.tables');


// Route::get('/status', [EmployeeController::class, 'status'])->name('status');

Route::get('/status', function () {
    return view('pages.status');
})->name('status');

Route::get('/Home', function () {
    return view('pages.index');
})->name('Home');

Route::get('/table', function () {
    return view('pages.table');
})->name('table');

//-====================================================================================================================================
// routes/web.php


// routes/web.php



// Route::middleware('auth')->group(function () {
//     Route::get('/users', [UsersController::class, 'admin'])->name('users.admin');
// });

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UsersController::class, 'admin'])->name('users.admin');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});


//-====================================================================================================================================


Route::get('/page1', [EmployeeController::class, 'showPage1'])->name('page1');
Route::get('/page2', [EmployeeController::class, 'showPage2'])->name('page2');
Route::get('/page3', [EmployeeController::class, 'showPage3'])->name('page3');
Route::get('/page4', [EmployeeController::class, 'showPage4'])->name('page4');
Route::get('/page5', [EmployeeController::class, 'showPage5'])->name('page5');

Route::get('/page6', [EmployeeController::class, 'showPage6'])->name('page6');
Route::get('/page7', [EmployeeController::class, 'showPage7'])->name('page7');
Route::get('/page8', [EmployeeController::class, 'showPage8'])->name('page8');
Route::get('/page9', [EmployeeController::class, 'showPage9'])->name('page9');
Route::get('/page10', [EmployeeController::class, 'showPage10'])->name('page10');

Route::get('/page11', [EmployeeController::class, 'showPage11'])->name('page11');
Route::get('/page12', [EmployeeController::class, 'showPage12'])->name('page12');
Route::get('/page13', [EmployeeController::class, 'showPage13'])->name('page13');
Route::get('/page14', [EmployeeController::class, 'showPage14'])->name('page14');
Route::get('/page15', [EmployeeController::class, 'showPage15'])->name('page15');

Route::get('/page16', [EmployeeController::class, 'showPage16'])->name('page16');
Route::get('/page17', [EmployeeController::class, 'showPage17'])->name('page17');
Route::get('/page18', [EmployeeController::class, 'showPage18'])->name('page18');
Route::get('/page19', [EmployeeController::class, 'showPage19'])->name('page19');
Route::get('/page20', [EmployeeController::class, 'showPage20'])->name('page20');

Route::get('/page21', [EmployeeController::class, 'showPage21'])->name('page21');
Route::get('/page22', [EmployeeController::class, 'showPage22'])->name('page22');
Route::get('/page23', [EmployeeController::class, 'showPage23'])->name('page23');
Route::get('/page24', [EmployeeController::class, 'showPage24'])->name('page24');
Route::get('/page25', [EmployeeController::class, 'showPage25'])->name('page25');

//===========================================================================

require __DIR__.'/auth.php';

