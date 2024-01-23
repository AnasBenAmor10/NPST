<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Stage;

class CompanyController extends Controller
{
    // ...

    public function respondToStageRequest(Request $request, $stageId)
    {
        $user = auth()->user();

        // Vérifiez si l'utilisateur est une entreprise (usertype == 3)
        if ($user->usertype == 3) {
            $stage = Stage::find($stageId);

            if (!$stage) {
                return redirect()->back()->with('error', 'Stage request not found.');
            }

            $response = $request->input('response');

            if ($response === 'accept') {
                // Mettez à jour la demande de stage comme acceptée
                $stage->accepted = true;
                // Set other accepted data
            } elseif ($response === 'reject') {
                // Mettez à jour la demande de stage comme rejetée
                $stage->rejected = true;
                // Set other rejection data
            }

            $stage->save();

            return redirect()->back()->with('success', 'Stage request reviewed successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to respond to stage requests.');
        }
    }
    public function viewStageRequests()
    {
        $companyId = auth()->user()->id; // Supposons que l'ID de l'entreprise soit utilisé pour l'authentification

        $stageRequests = Stage::where('company_id', $companyId)->get();

        return view('company.viewstagerequests', compact('stageRequests', 'companyId'));
    }

    // public function Dashboard()
    // {
    //     return view('company.dashboard');
    // }
    public function informations()
    {
        $company = Company::all();
        return view('company.informations', compact('company'));
    }
}
