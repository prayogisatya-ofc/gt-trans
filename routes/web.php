<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicBookingController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rute', [RouteController::class, 'index'])->name('routes.index');
Route::get('/rute/{slug}', [RouteController::class, 'show'])->name('routes.show');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/layanan', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::get('/booking/{code}', [PublicBookingController::class, 'show'])->name('public.booking.show');
Route::get('/booking/{code}/ticket', [PublicBookingController::class, 'downloadTicket'])->name('public.booking.ticket');
