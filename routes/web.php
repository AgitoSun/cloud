<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\SharedController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function () {
    Route::get('/files', [FileController::class, 'index'])->name('files');
    Route::post('/files/upload', [FileController::class, 'upload'])->name('upload');
    Route::get('/files/download', [FileController::class, 'download'])->name('download');
    Route::get('/files/{file}/move', [FileController::class, 'move'])->name('file.move');
    Route::get('/files/{file}/rename', [FileController::class, 'rename'])->name('file.rename');
    Route::delete('/files/{file}/destroy', [FileController::class, 'destroy'])->name('file.destroy');

    Route::get('/share', [SharedController::class, 'index'])->name('share.index');
    Route::get('/files/share/{file}/open', [SharedController::class, 'open'])->name('share.open');
    Route::get('/files/share/{file}/close', [SharedController::class, 'close'])->name('share.close');

    Route::get('/files/directory/store', [DirectoryController::class, 'store'])->name('directory.store');
    Route::get('/files/directory/{directory}', [DirectoryController::class, 'show'])->name('directory.show');
    Route::get('/files/directory/{directory}/rename', [DirectoryController::class, 'rename'])->name('directory.rename');
    Route::delete('/files/directory/{directory}/destroy', [DirectoryController::class, 'destroy'])->name('directory.destroy');

    Route::get('/recycle', [RecycleController::class, 'index'])->name('recycle.index');
    Route::get('/recycle/{file}/restore', [RecycleController::class, 'restore'])->name('recycle.restore');
    Route::delete('/recycle/{file}/destroy', [RecycleController::class, 'destroy'])->name('recycle.destroy');








    Route::get('/home', function () {
        return view('contents/pages/home');
    })->name('home');

    //Route::get('/files', function () {
    //    return view('contents/pages/files');
    //})->name('files');

    Route::get('/starred', function () {
        return view('contents/pages/starred');
    })->name('starred');

//    Route::get('/shared', function () {
//        return view('contents/pages/shared');
//    })->name('shared');

//    Route::get('/recycle', function () {
//        return view('contents/pages/recycle');
//    })->name('recycle');

    Route::get('/settings', function () {
        return view('contents/pages/settings');
    })->name('settings');
});


Route::get('/public', [SharedController::class, 'auth'])->name('get.shared.auth');
Route::post('/public/download', [SharedController::class, 'download'])->name('get.shared');


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
