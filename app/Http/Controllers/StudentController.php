<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    // public function dashboard()
    // {
    //     return view('student.dashboard');
    // }
    public function stage_menu()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role != '3') {
            return redirect('/');
        }
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_stage = Stage::where('etudiant_id', auth()->user()->id)->count();
            $mystage = Stage::where('etudiant_id', auth()->user()->id)->get();;
            return view('stage', compact('total_stage', 'mystage'));
        }
    }
    public function sendRequestToCompany(Request $request, $companyId)
    {
        $studentId = auth()->user()->id;

        // Create a new stage request
        $stage = new Stage();
        $stage->etudiant_id = $studentId;
        $stage->company_id = $companyId;
        // Set other stage request data
        $stage->save();

        return redirect()->back()->with('success', 'Stage request sent successfully!');
    }

    public function viewMyStageRequests()
    {
        $studentId = auth()->user()->id;
        $myStageRequests = Stage::where('etudiant_id', $studentId)->get();

        return view('student.my_stage_requests', compact('myStageRequests'));
    }
    
}
