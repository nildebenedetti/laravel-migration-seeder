<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index() {

    $trains = Train::orderBy('next_planned', 'asc')
                    ->orderBy('departure_time', 'asc')
                    ->get();

    return view('home', compact('trains'));
    
    }
}
