<?php

use App\Http\Controllers\Admin\CanceledController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TecnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function (){
        // DashboardController
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // ProjectController
        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
        // CanceledController
        Route::get('/canceled', [CanceledController::class, 'index'])->name('canceled');
        Route::get('/restore/{id}', [CanceledController::class, 'restore'])->name('restore');
        Route::delete('/defDelite/{id}', [CanceledController::class, 'defDelite'])->name('defDelite');
        Route::delete('/defDeliteAll', [CanceledController::class, 'defDeliteAll'])->name('defDeliteAll');
        // TypeController
        Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
        //TecnologyController
        Route::resource('tecnologies', TecnologyController::class)->parameters(['tecnologies' => 'tecnology:slug']);
   
    });

require __DIR__.'/auth.php';
