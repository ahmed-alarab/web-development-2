<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportsController extends Controller
{
    public function index(){
        return view('/reports');

    }
    public function totalEarnings(){
        return view('/total_earnings');
    }
    public function driverPerformance(){
        return view('/driver_performance');
    }
    public function clientSpending(){
        return view('/client_spending');
    }
    public function demandTrends(){
        return view('/demand_trends');
    }
}
