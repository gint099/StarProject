<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\LightconeController;
use App\Http\Controllers\RelicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;

// Home atau redirect
Route::get('/', [HomeController::class, 'index'])->name('home');

// Characters
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/{character}', [CharacterController::class, 'show'])->name('characters.show');

// Lightcones
Route::get('/lightcones', [LightconeController::class, 'index'])->name('lightcones.index');
Route::get('/lightcones/{lightcone}', [LightconeController::class, 'show'])->name('lightcones.show');

// Relics
Route::get('/relics', [RelicController::class, 'index'])->name('relics.index');

// Tips&Builds
Route::prefix('builds')->name('builds.')->group(function () {
    Route::get('/', [BuildController::class, 'index'])->name('index');
    Route::get('/create', [BuildController::class, 'create'])->name('create');
    Route::post('/', [BuildController::class, 'store'])->name('store');
    Route::get('/{build}', [BuildController::class, 'show'])->name('show');
    Route::get('/{build}/edit', [BuildController::class, 'edit'])->name('edit');
    Route::put('/{build}', [BuildController::class, 'update'])->name('update');
    Route::delete('/{build}', [BuildController::class, 'destroy'])->name('destroy');
});
// Komentar Build
Route::post('/builds/{build}/comments', [BuildController::class, 'storeComment'])->name('builds.comments.store');

// Forum
Route::get('/forum', function () {
    return redirect('https://discord.gg/srs');
})->name('forum');

// FAQ
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq.index');

// Guide
Route::get('/guides', fn () => view('guides.index'))->name('guides.index');
Route::get('/guides/character', fn () => view('guides.character'))->name('guides.character');
Route::get('/guides/character-progression', fn () => view('guides.character-progression'))->name('guides.character-progression');
Route::get('/guides/light-cones', fn () => view('guides.light-cones'))->name('guides.light-cones');
Route::get('/guides/relics', fn () => view('guides.relic-guide'))->name('guides.relics');
Route::get('/guides/exploration', fn () => view('guides.exploration'))->name('guides.exploration');
Route::get('/guides/combat', fn () => view('guides.combat-guide'))->name('guides.combat');
Route::get('/guides/daily-farming', fn () => view('guides.daily-farming'))->name('guides.daily-farming');
// Route::get('/guides/team-archetypes', fn () => view('guides.team-archetypes'))->name('guides.team-archetypes');
Route::get('/guides/team-archetypes', [GuideController::class, 'teamArchetypes'])->name('guides.team-archetypes');


