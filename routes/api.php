<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Invitation;
use App\Http\Controllers\MessageController;

/* GUESTS */
Route::get('v1/guest/{slug}', [Invitation::class, 'getBySlug']);

/* MESSAGES */
Route::post('v1/message/add', [MessageController::class, 'createMessage']);
Route::get('v1/message/list', [MessageController::class, 'listMessages']);