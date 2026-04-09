<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PostCrud;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/post/create', 'pages::post.create');
Route::get('/posts', PostCrud::class);
