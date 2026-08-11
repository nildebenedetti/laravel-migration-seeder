<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TrainController extends Controller
{

    public function index() {

    $trains = Train::whereDate('next_planned', '>=', Carbon::today())
                    ->orderBy('next_planned', 'asc')
                    ->orderBy('departure_time', 'asc')
                    ->get();

    return view('home', compact('trains'));
    
    }
}
