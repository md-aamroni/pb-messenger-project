<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Pages\Chat\MasterComponent as ChatMasterComponent;
use App\Livewire\Pages\Home\MasterComponent as HomeMasterComponent;
use App\Livewire\Pages\Reel\MasterComponent as ReelMasterComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('signature')->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', HomeMasterComponent::class)->name('home');
    Route::get('/chat', ChatMasterComponent::class)->name('chat');
    Route::get('/reel', ReelMasterComponent::class)->name('reel');
});

Route::get('/link', function () {
    // A -  '01j8h2649z2mf7cj2tr3c30act', '01j8h264cm99zgvnmb57js3p1r'
    // U -  '01j8h264gs0h5mjtjppfv7pg3d', '01j8h264jdv4msgjx89w35d8pg', '01j8h264kedn62m6ymzmb8tvx2'
    $user = \App\Models\User::query()->where('id', '=', '01j8h2649z2mf7cj2tr3c30act')->first();
    $link = \App\Utilities\PasswordLessLogin::generate(user: $user);
    dd($link);
});


Route::post('logout', LogoutController::class)->name('logout');
