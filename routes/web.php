<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\DashboardController;

use App\Livewire\Users\Index as UserIndex;
use App\Livewire\MedicalActions\Index as MedicalActionIndex;
use App\Livewire\Patients\Index as PatientIndex;
use App\Livewire\HargaTindakan\Index as HargaTindakanIndex;
use App\Livewire\Transaksi\Index as TransaksiIndex;
use App\Livewire\RiwayatTransaksi\Index as RiwayatTransaksiIndex;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    // Route untuk daftar user
    Route::get('/users', UserIndex::class)->name('users.index');

    Route::get('/tindakan', HargaTindakanIndex::class)->name('harga-tindakan.index');

    // Route untuk Medical Actions
    Route::get('/MedicalActions', MedicalActionIndex::class)->name('MedicalActions.index');

    // Route untuk pasien
    Route::get('/patients', PatientIndex::class)->name('patients.index');

    Route::get('/transaksi', TransaksiIndex::class)->name('transaksi.index');

    Route::get('/riwayat-transaksi', RiwayatTransaksiIndex::class)->name('riwayat-transaksi.index');

});

require __DIR__ . '/auth.php';
