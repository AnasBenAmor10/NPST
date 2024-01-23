<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller

{
    // Usertype : 1-Etudiant  2-Enseignant  3-Societé    Role: 1 SuperAdmin  2- Admin     3-User

    // function index to view all users
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'Numero' => 'required',
            'adresse' => 'required',
            'image' => 'required',
            'cin' => 'required',
            'role' => 'required',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }


    public function delete($id)
    {
        $user = User::find($id);
        $this->authorize('delete', User::class);

        if ($user) {
            $user->delete();
            return redirect('users');
        }
    }
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required',
            'Numero' => 'required',
            'adresse' => 'required',
            'image' => 'required',
            'cin' => 'required',
            'role' => 'required',
        ]);
        $this->authorize('update', User::class);


        $user->update($request->all());

        return redirect('users');
    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login ');
    }


    // dashboard to view if you are student Usertype=1 teacher usertype=2 company usertype=3
    public function dashboard()
    {
        if (auth()->user()->usertype == 1) {
            return view('dashboard');
        }
        if (auth()->user()->usertype == 3) {
            return view('dashboard');
        }
        if (auth()->user()->usertype == 2) {
            return view('dashboard');
        }
    }
    // page mes stages
    public function viewStage()
    {
        if (auth()->user()->usertype == 1) {
            // $Encadrant = User::where('id', $encadrant_id)->get();
            $total_stage = Stage::where('etudiant_id', auth()->user()->id)->count();
            $mystage = Stage::where('etudiant_id', Auth()->user()->id)->get();
            return view('student.viewStage', compact('mystage', 'total_stage'));
        }
    }
    // information personelle de l'etudiant
    public function informations()
    {
        if (auth()->user()->usertype == 1) {
            $etudiants = User::where('id', '2')->get();
            return view('student.informations', compact('etudiants'));
        }
    }

    //    send request to company test number 1

    public function sendRequestToCompany(Request $request, $companyId)
    {
        $studentId = auth()->user()->id;

        // Create a new stage request
        $stage = new Stage();
        $stage->etudiant_id = $studentId;
        $stage->company_id = $companyId;
        $stage->etat_societe = 'demande en attente';
        $stage->type = $request->type;
        $type = $request->type;
        $stage->save();
        $studentId->stages()->attach($stage->id);
        if ($type === 'pfe') {
            $stage->enseignant_id = $request->enseignant_id;
            $stage->save();
        }

        return redirect()->back()->with('success', 'Stage request sent successfully!');
    }

    public function viewMyStageRequests()
    {
        $studentId = auth()->user()->id;
        $myStageRequests = Stage::where('etudiant_id', $studentId)->get();

        return view('student.my_stage_requests', compact('myStageRequests'));
    }
    public function demandestage()
    {
        $companies = Company::all();
        return view('student.demandestage', compact('companies'));
    }
    public function demandeencadrant()
    {
        $encadrants = User::where('usertype', '2')->get();
        return view('student.demandeencadrant', compact('encadrants'));
    }

    public function assignEncadrantToStage($stageId)
    {
        $stage = Stage::find($stageId);
        $encadrants = User::where('usertype', '2')->get();
        return view('student.assignEncadrantTostage', compact('stage', 'encadrants'));
    }
    public function Encadrantdone($stageId, $encadrantId)
    {
        $stage = Stage::find($stageId);
        if (!$stage) {
            return redirect()->back()->with('error', 'Stage not found.');
        }
        // Assign the encadrant to the stage
        $stage->encadrant_id = $encadrantId;
        $stage->save();

        return redirect()->route('student.viewStage')->with('success', 'Encadrant assigned successfully.');
    }


    // my new work

    public function showDemande()
    {
        $encadrants = User::where('usertype', '2')->get();
        return view('demande', compact('encadrant'));
    }
    // public function EnvoiDemande(Request $request)
    // {
    //     $etudiant = auth()->user();
    //     $stage = new Stage();
    //     $stage->company_id = $request->company_name;
    //     $stage->type = $request->type;
    //     $stage->etat_societe = 'demande en attente';
    //     $type = $request->type;
    //     $stage->save();
    //     $etudiant->stages()->attach($stage->id);
    //     if ($type === 'pfe') {
    //         $stage->enseignant_id = $request->enseignant_id;
    //         $stage->save();
    //     }
    //     return redirect()->route('dashboard')->with('success', 'Demande envoyeéé avec succès');
    // }
}
