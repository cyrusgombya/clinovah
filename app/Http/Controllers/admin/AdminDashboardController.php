<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $startThisMonth = $now->copy()->startOfMonth();
        $startLastMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();
        $endLastMonth = $startThisMonth->copy()->subSecond();

        // New Booking: appointments created this month
        $bookingsThisMonth = Appointment::whereBetween('created_at', [$startThisMonth, $now])->count();
        $bookingsLastMonth = Appointment::whereBetween('created_at', [$startLastMonth, $endLastMonth])->count();

        // Customers: total users
        $customersTotal = User::count();
        $customersThisMonth = User::whereBetween('created_at', [$startThisMonth, $now])->count();
        $customersLastMonth = User::whereBetween('created_at', [$startLastMonth, $endLastMonth])->count();

        // New Clinics: clinics created this month
        $clinicsThisMonth = Clinic::whereBetween('created_at', [$startThisMonth, $now])->count();
        $clinicsLastMonth = Clinic::whereBetween('created_at', [$startLastMonth, $endLastMonth])->count();

        // Revenue: set 0 for now to avoid DB errors (until payments exist)
        $revenueThisMonth = 0;
        $revenueLastMonth = 0;

        return view('admin.dashboard', compact(
            'bookingsThisMonth',
            'bookingsLastMonth',
            'customersTotal',
            'customersThisMonth',
            'customersLastMonth',
            'clinicsThisMonth',
            'clinicsLastMonth',
            'revenueThisMonth',
            'revenueLastMonth'
        ));
    }
}