<?php

use App\Http\Controllers\Admin\Aset\AreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Aset\AsetController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Aset\ClusterController;
use App\Http\Controllers\Admin\User\UserController;


Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('logininsert', [LoginController::class, 'logininsert'])->name('logininsert');


/* Route::prefix('aset')->middleware('guest')->group(function () {
    Route::get('/add', [AsetController::class, 'add'])->name('aset.add');
}); */

Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {


    //Area
    Route::get('/area', [AreaController::class, 'index'])->name('area.index');
    Route::get('/area/add', [AreaController::class, 'add'])->name('area.add');
    Route::post('/area', [AreaController::class, 'store'])->name('area.store');
    Route::get('/area/{area}/edit', [AreaController::class, 'edit'])->name('area.edit');
    Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
    Route::delete('/area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
    //Ajax Area
    Route::get('/area/semuaarea', [AreaController::class, 'semuaarea'])->name('area.semuaarea');

    //Cluster
    Route::get('/cluster', [ClusterController::class, 'index'])->name('cluster.index');
    Route::get('/cluster/add', [ClusterController::class, 'add'])->name('cluster.add');
    Route::post('/cluster', [ClusterController::class, 'store'])->name('cluster.store');
    Route::get('/cluster/{cluster}/edit', [ClusterController::class, 'edit'])->name('cluster.edit');
    Route::put('/cluster/{cluster}', [ClusterController::class, 'update'])->name('cluster.update');
    Route::delete('/cluster/{cluster}', [ClusterController::class, 'destroy'])->name('cluster.destroy');
    //ajax
    Route::get('/cluster/get-all', [ClusterController::class, 'getAll'])->name('cluster.getAll');


    //User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    //Ajax
    Route::get('user/get-all', [UserController::class, 'getAll'])->name('user.getAll');

    //Aset
    Route::get('/aset/add', [AsetController::class, 'add'])->name('aset.add');
    Route::post('/aset', [AsetController::class, 'store'])->name('aset.store');
    Route::get('/aset', [AsetController::class, 'index'])->name('aset.index');
    Route::get('/aset/{aset}/edit', [AsetController::class, 'edit'])->name('aset.edit');
    Route::put('/aset/{aset}', [AsetController::class, 'update'])->name('aset.update');
    Route::delete('/aset/{aset}', [AsetController::class, 'destroy'])->name('aset.destroy');
    //Ajax
    Route::get('aset/get-all', [AsetController::class, 'getAll'])->name('aset.getAll');
    Route::get('/aset/{aset}', [AsetController::class, 'show'])->name('aset.show');
});
