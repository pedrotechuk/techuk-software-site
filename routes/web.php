<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/politica-de-privacidade', [SiteController::class, 'privacidade'])->name('privacidade');
Route::get('/termos-de-uso', [SiteController::class, 'termos'])->name('termos');
Route::get('/sitemap.xml', [SiteController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SiteController::class, 'robots'])->name('robots');
