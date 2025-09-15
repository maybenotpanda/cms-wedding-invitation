<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invitation;
use App\Http\Controllers\Message;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('v1/guest/{slug}', [Invitation::class, 'getBySlug']);

/* MESSAGES */
Route::post('v1/message/add', [Message::class, 'store']);
Route::get('v1/message/list', [Message::class, 'index']);