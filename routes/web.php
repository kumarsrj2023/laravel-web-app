<?php

use App\Livewire\AdminDashboard;
use App\Livewire\Fronted\Index as FrontedIndex;
use App\Livewire\Fronted\Services;
use App\Livewire\Fronted\SingleService;
use App\Livewire\OurTeam\Create as OurTeamCreate;
use App\Livewire\OurTeam\Edit as OurTeamEdit;
use App\Livewire\OurTeam\Index as OurTeamIndex;
use App\Livewire\Services\Create;
use App\Livewire\Services\Edit;
use App\Livewire\Services\Index;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Route::get('/admin', AdminDashboard::class)->name('admin.dashboard');
// services component
Route::get('/admin/services', Index::class)->name('admin.services.index');
Route::get('/admin/services/create', Create::class)->name('admin.services.create');
Route::get('/admin/services/edit/{id}', Edit::class)->name('admin.services.edit');
// our team component
Route::get('/admin/team', OurTeamIndex::class)->name('admin.team.index');
Route::get('/admin/team/create', OurTeamCreate::class)->name('admin.team.create');
Route::get('/admin/team/edit/{id}', OurTeamEdit::class)->name('admin.team.edit');

// For Fronted 
Route::get('/', FrontedIndex::class)->name('fronted.index');
Route::get('/services', Services::class)->name('fronted.service');
Route::get('/services/{id}', SingleService::class)->name('fronted.single.service');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
