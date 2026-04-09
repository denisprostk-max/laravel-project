<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PostCrud;
use App\Livewire\DemoPage;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/navigation', 'navigation')->name('navigation');
Route::view('/about', 'about')->name('about');
Route::view('/contacts', 'contacts')->name('contacts');

Route::get('/posts', PostCrud::class)->name('posts');
Route::livewire('/demo-livewire', 'demo-page')->name('demo.livewire');

Route::livewire('/post/create', 'pages::post.create');

