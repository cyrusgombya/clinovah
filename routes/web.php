<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ClinicAuthController;
use App\Http\Controllers\ClinicDashboardController;
use App\Http\Controllers\ClinicDocumentController;
use App\Http\Controllers\ClinicDentistController;
use App\Http\Controllers\DentistDocumentController;
use App\Http\Controllers\ClinicAppointmentController;

use App\Http\Controllers\Public\ClinicBrowseController;
use App\Http\Controllers\Public\AppointmentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ClinicDiscoveryController;

use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {

    Mail::raw('Clinovah email test successful.', function ($message) {

        $message->to('cyrusgombya@gmail.com')
                ->subject('Clinovah Test Email');
    });

    return 'Email sent!';
});

Route::view('/offline', 'site.offline')->name('offline');

// ✅ Site pages (home becomes /)
Route::name('site.')->group(function () {

    Route::view('/', 'site.home')->name('home');

    Route::view('/about', 'site.about')->name('about');
    Route::view('/contact', 'site.contact')->name('contact');

    Route::view('/departments', 'site.departments')->name('departments');
    Route::view('/services', 'site.services')->name('services');

    Route::view('/doctors', 'site.doctors')->name('doctors');
    Route::view('/appointment', 'site.appointment')->name('appointment');

    Route::view('/department-details', 'site.department-details')->name('department_details');
    Route::view('/service-details', 'site.service-details')->name('service_details');

    Route::view('/testimonials', 'site.testimonials')->name('testimonials');
    Route::view('/faq', 'site.faq')->name('faq');

    Route::view('/gallery', 'site.gallery')->name('gallery');

    Route::view('/terms', 'site.terms')->name('terms');
    Route::view('/privacy', 'site.privacy')->name('privacy');

    Route::view('/404-template', 'site.404')->name('404');
});


// =========================================================
// PUBLIC CLINIC DISCOVERY
// =========================================================

Route::get('/clinics/near-me', [ClinicDiscoveryController::class, 'index'])
    ->name('clinics.near_me');

Route::get('/api/clinics/nearby', [ClinicDiscoveryController::class, 'nearby'])
    ->name('api.clinics.nearby');


// =========================================================
// PUBLIC CLINIC BROWSING
// =========================================================

Route::get('/clinics', [ClinicBrowseController::class, 'index'])
    ->name('clinics.index');

Route::get('/clinics/{clinic}/available-slots', [ClinicBrowseController::class, 'availableSlots'])
    ->name('clinics.available_slots');

Route::get('/clinics/{clinic}', [ClinicBrowseController::class, 'show'])
    ->name('clinics.show');




// =========================================================
// PUBLIC APPOINTMENT BOOKING (GUESTS + USERS)
// =========================================================

Route::post('/clinics/{clinic}/appointments', [AppointmentController::class, 'store'])
    ->name('appointments.store');

Route::get('/appointments/{appointment}/confirmation', [AppointmentController::class, 'confirmation'])
    ->name('appointments.confirmation');

Route::get('/track-booking', [AppointmentController::class, 'trackForm'])
    ->name('appointments.track');

Route::post('/track-booking', [AppointmentController::class, 'trackSearch'])
    ->name('appointments.track.search');


// =========================================================
// AUTHENTICATED USER AREA
// =========================================================

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // appointments
    Route::get('/dashboard/appointments', [UserDashboardController::class, 'appointments'])
        ->name('dashboard.appointments');

    // cancel appointment
    Route::post('/dashboard/appointments/{appointment}/cancel', [UserDashboardController::class, 'cancelAppointment'])
        ->name('dashboard.appointments.cancel');

    // optional user appointments route
    Route::get('/my-appointments', [AppointmentController::class, 'mine'])
        ->name('appointments.mine');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// =========================================================
// CLINIC PORTAL
// =========================================================

Route::prefix('clinic')->name('clinic.')->group(function () {

    // -----------------------------------------
    // guest clinic auth
    // -----------------------------------------
    Route::middleware('guest:clinic')->group(function () {

        Route::get('/register', [ClinicAuthController::class, 'showRegister'])
            ->name('register');

        Route::post('/register', [ClinicAuthController::class, 'register'])
            ->name('register.store');

        Route::get('/login', [ClinicAuthController::class, 'showLogin'])
            ->name('login');

        Route::post('/login', [ClinicAuthController::class, 'login'])
            ->name('login.store');
    });

    // -----------------------------------------
    // authenticated clinics
    // -----------------------------------------
    Route::middleware('clinic.auth')->group(function () {

        Route::get('/dashboard', [ClinicDashboardController::class, 'index'])
            ->name('dashboard');

        Route::post('/logout', [ClinicAuthController::class, 'logout'])
            ->name('logout');


        // =====================================
        // clinic profile
        // =====================================

        Route::get('/profile', [\App\Http\Controllers\ClinicProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile', [\App\Http\Controllers\ClinicProfileController::class, 'update'])
            ->name('profile.update');


        // =====================================
        // clinic documents
        // =====================================

        Route::get('/documents', [ClinicDocumentController::class, 'index'])
            ->name('documents');

        Route::post('/documents', [ClinicDocumentController::class, 'store'])
            ->name('documents.store');


        // =====================================
        // dentists
        // =====================================

        Route::get('/dentists', [ClinicDentistController::class, 'index'])
            ->name('dentists');

        Route::post('/dentists', [ClinicDentistController::class, 'store'])
            ->name('dentists.store');


        // =====================================
        // dentist documents
        // =====================================

        Route::get('/dentists/{dentist}/documents', [DentistDocumentController::class, 'index'])
            ->name('dentists.documents');

        Route::post('/dentists/{dentist}/documents', [DentistDocumentController::class, 'store'])
            ->name('dentists.documents.store');


        // =====================================
        // clinic appointments
        // =====================================

        Route::get('/appointments', [ClinicAppointmentController::class, 'index'])
            ->name('appointments.index');

        Route::post('/appointments/{appointment}/confirm', [ClinicAppointmentController::class, 'confirm'])
            ->name('appointments.confirm');

        Route::post('/appointments/{appointment}/cancel', [ClinicAppointmentController::class, 'cancel'])
            ->name('appointments.cancel');

        Route::post('/appointments/{appointment}/no-show', [ClinicAppointmentController::class, 'markNoShow'])
            ->name('appointments.no_show');
    });
});


// =========================================================
// LARAVEL AUTH ROUTES
// =========================================================

require __DIR__ . '/auth.php';