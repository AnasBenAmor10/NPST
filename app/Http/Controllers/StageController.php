<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\ViewException;

class StageController extends Controller
{
    //
    public function studentDashboard()
    {
        // if (auth()->user()->usertype == 1) {
        //     $studentStages = Stage::where('etudiant_id', auth()->user()->id)->get();
        //     return view('dashboard', compact('studentStages'));
        // }

        // Handle other user types or scenarios
    }
    // public function stagestudent()
    // {
    //     if (auth()->user()->usertype == 1) {
    //         $mystage = Stage::where('etudiant_id', Auth()->user()->id)->get();
    //         return view('dashboard', ['mystage'=>$mystage]);
    //     }
    // }
}
