<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\ClinicDocumentController;
use App\Http\Controllers\Admin\DentistDocumentController;

Route::name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
       Route::get('/', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

        // Clinics
        Route::get('/clinics', [ClinicController::class, 'index'])->name('clinics.index');
        Route::get('/clinics/pending', [ClinicController::class, 'pending'])->name('clinics.pending');
        Route::get('/clinics/{clinic}', [ClinicController::class, 'show'])->name('clinics.show');
        Route::post('/clinics/{clinic}/approve', [ClinicController::class, 'approve'])->name('clinics.approve');
        Route::post('/clinics/{clinic}/reject', [ClinicController::class, 'reject'])->name('clinics.reject');

        // ✅ Clinic document view/download (private storage)
        Route::get('/clinic-documents/{clinicDocument}/view', [ClinicDocumentController::class, 'view'])->name('clinic-documents.view');
        Route::get('/clinic-documents/{clinicDocument}/download', [ClinicDocumentController::class, 'download'])->name('clinic-documents.download');

        // ✅ Dentist document view/download
        Route::get('/dentist-documents/{dentistDocument}/view', [DentistDocumentController::class, 'view'])->name('dentist-documents.view');
        Route::get('/dentist-documents/{dentistDocument}/download', [DentistDocumentController::class, 'download'])->name('dentist-documents.download');
    });
});