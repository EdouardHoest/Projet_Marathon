<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ControllerAccueil extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function accueil()
    {
        $series = Serie::orderBy('note', 'desc')->limit(5)->get();

        return view('accueil', ['series' => $series]);

    }
}
