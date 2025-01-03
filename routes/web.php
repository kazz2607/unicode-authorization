<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DashboardControlller;
use App\Http\Controllers\Backend\UsersControlller;
use App\Http\Controllers\Backend\PostsControlller;
use App\Http\Controllers\Backend\GroupsControlller;
use App\Models\Groups;
use App\Models\Posts;
use App\Models\User;

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

Auth::routes([
    'register' => false
]);

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/',[DashboardControlller::class,'index'])->name('dashboard');
    
    // Menu Users
    Route::prefix('users')->name('users.')->middleware('can:users')->group(function(){
        Route::get('/',[UsersControlller::class,'index'])->name('index');
        Route::get('/add',[UsersControlller::class,'add'])->name('add')->can('users.add');
        Route::post('/add',[UsersControlller::class,'postAdd'])->can('users.add');
        Route::get('/edit/{user}',[UsersControlller::class,'edit'])->name('edit')->can('users.edit');
        Route::post('/edit/{user}',[UsersControlller::class,'postEdit'])->can('users.edit');
        Route::get('/delete/{user}',[UsersControlller::class,'delete'])->name('delete')->can('users.delete');
    });
    
    // Menu Groups
    Route::prefix('groups')->name('groups.')->middleware('can:groups')->group(function(){
        Route::get('/',[GroupsControlller::class,'index'])->name('index');
        Route::get('/add',[GroupsControlller::class,'add'])->name('add')->can('groups.add');
        Route::post('/add',[GroupsControlller::class,'postAdd'])->can('groups.add');
        Route::get('/edit/{group}',[GroupsControlller::class,'edit'])->name('edit')->can('groups.edit');
        Route::post('/edit/{group}',[GroupsControlller::class,'postEdit'])->can('groups.edit');
        Route::get('/delete/{group}',[GroupsControlller::class,'delete'])->name('delete')->can('groups.delete');
        Route::get('/permission/{group}',[GroupsControlller::class,'permission'])->name('permission')->can('groups.permission');
        Route::post('/permission/{group}',[GroupsControlller::class,'postPermission'])->can('groups.permission');
    });
    
    // Menu Posts
    Route::prefix('posts')->name('posts.')->middleware('can:posts')->group(function(){
        Route::get('/',[PostsControlller::class,'index'])->name('index');
        Route::get('/add',[PostsControlller::class,'add'])->name('add')->can('posts.add');
        Route::post('/add',[PostsControlller::class,'postAdd'])->can('posts.add');
        Route::get('/edit/{post}',[PostsControlller::class,'edit'])->name('edit')->can('posts.edit');
        Route::post('/edit/{post}',[PostsControlller::class,'postEdit'])->can('posts.edit');
        Route::get('/delete/{post}',[PostsControlller::class,'delete'])->name('delete')->can('posts.delete');
    });
    
});