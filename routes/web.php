<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Post\Create;
use App\Http\Livewire\Post\Edit;
use App\Http\Livewire\Post\Index;
use Illuminate\Support\Facades\Route;

// Posts
Route::get('/', Index::class);
Route::get('/post', Index::class);
Route::get('/post/create', Create::class);
Route::get('/post/{id}/edit', Edit::class);
Route::get('/post/{id}/delete', [Index::class, 'destroy']);

Route::get('/about', About::class);
