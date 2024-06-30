<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserController;

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

Route::get('/', [FrontController::class, 'welcome'])->name('homepage');

Route::get('/categorie/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/nuovo-annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');

Route::get('dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

Route::get('tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');

//route Home revisore
Route::get('revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//route accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//route rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//route richiesta revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//route rendi revisore
Route::get('rendi/revisore,{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->middleware('web')->name('auth.google');

Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');
Route::post('/announcements/{announcement}/add-to-favorites', [AnnouncementController::class, 'addToFavorites'])->name('announcements.addToFavorites');
Route::get('/announcements/favorites', [AnnouncementController::class, 'showFavorites'])->name('announcements.showFavorites');
Route::delete('/announcements/{announcement}/remove-from-favorites', [AnnouncementController::class, 'removeFromFavorites'])
    ->name('announcements.removeFromFavorites');
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'deleteAnnouncement'])->name('announcements.delete');
Route::get('/profilo-utente', [AnnouncementController::class, 'showUserProfile'])->name('userProfile');
Route::post('/newsletter-subscription', [NewsletterController::class,'addEmail'])->name('newsletter.suscribe');
Route::get('dispatcher', [NewsletterController::class, 'sendNewsletter'])->middleware('auth')->name('push.newsletter');
Route::post('/contatti/invio',[NewsletterController::class,'sendContact'])->name('contact.send');
Route::post('photo-update',[UserController::class,'upload'])->middleware('auth')->name('photo-upload');
Route::post('phone-number-update',[UserController::class,'numberUpdate'])->middleware('auth')->name('number-upload');
Route::get('tutti/annunci/vecchi-nuovi', [AnnouncementController::class, 'indexAnnouncementTimeAsc'])->name('announcements.index.time.asc');
Route::get('tutti/annunci/prezzo-discendente', [AnnouncementController::class, 'indexAnnouncementPriceDesc'])->name('announcements.index.price.desc');
Route::get('tutti/annunci/prezzo-ascendente', [AnnouncementController::class, 'indexAnnouncementPriceAsc'])->name('announcements.index.price.asc');
