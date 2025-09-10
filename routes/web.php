<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Invitation;
use App\Http\Controllers\GenerateBarcode;
use App\Http\Controllers\GenerateQrCode;

Route::get('/', [Home::class, 'index']);

Route::get('/invitation', [Invitation::class, 'index']);
Route::post('/invitation', [Invitation::class, 'store'])->name('invitation.store');

Route::get('/qr-maps', [GenerateQrCode::class, 'index']);
Route::get('/qr-maps/download', [GenerateQrCode::class, 'download'])->name('qr.maps.download');

Route::get('/barcode', [GenerateBarcode::class, 'index'])->name('barcode.download');
Route::get('/barcode-download', [GenerateBarcode::class, 'download'])->name('barcode.download');
