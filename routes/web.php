<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlockController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BlockController::class)->group(function (){
    Route::get('blocks', 'index')->name('show.blocks');
    Route::get('create-block', 'create')->name('create.block');
    Route::post('store-block', 'store')->name('store.block');
    Route::get('edit-block/{block}', 'edit')->name('edit.block');
    Route::put('update-block/{block}', 'update')->name('update.block');
    Route::delete('delete-block/{block}', 'destroy')->name('delete.block');
});


Route::resource('authors', AuthorController::class);



