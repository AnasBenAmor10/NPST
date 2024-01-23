<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Supervisor;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Type\NullType;

class AdminController extends Controller
{
    // view function
    public function home()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role != '0') {
            return redirect('/');
        }
        return redirect('redirects');
    }
    public function etudiant_menu()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role != '0') {
            return redirect('/');
        }
        $total_etudiant = DB::table('users')->where('usertype', '1')->count();
        $user = DB::table('users')->where('usertype', '1')->get();;
        return view('admin.etudiants', compact('total_etudiant', 'users'));
    }
    public function stage_menu()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role != '0') {
            return redirect('/');
        }
        $total_stage = DB::table('stages')->count();
        $stages = Stage::all();
        return view('admin.stage', compact('total_stage', 'stage'));
    }
    public function enseignant_menu()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role != '0') {
            return redirect('/');
        }
        $total_enseignant = DB::table('users')->where('usertype', '2')->count();
        $enseignants = DB::table('users')->where('usertype', '2')->get();
        return view('admin.enseignants', compact('total_enseignant', 'enseignants'));
    }
    public function encadrant_menu()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $role = Auth::user()->role;
        if ($role != '0') {
            return redirect('/');
        }
        $encadrants = Supervisor::get();
        $nombreStagesParEncadrant = [];
        foreach ($encadrants as $encadrant) {
            $nombreStages = Supervisor::where('encadrant_id', $encadrant->id)->count();
            $nombreStagesParEncadrant[$encadrant->id] = $nombreStages;
        }
        return view('admin.encadrants', compact('encadrants', 'nombreStageParEncadrant'));
    }
    //add function
    public function add_stage()
    {
        return view('admin.add_stage');
    }
    public function add_etudiant()
    {
        return view('admin.add_etudiant');
    }
    public function add_enseigant()
    {
        return view('admin.add_enseigant');
    }
    public function add_encadrant()
    {
        return view(('admin.add_encadrant'));
    }
    public function add_admin()
    {
        return view('admin.add_admin');
    }
    public function add_admin_process(Request $request)
    {
        $email = DB::table('users')->where('email', $request->email)->count();

        if ($email > 0) {
            session()->flash('wrong', 'Email already registred !');
            return back();
        }
        $phone = DB::table('users')->where('phone', $request->phone)->count();


        if ($phone > 0) {

            session()->flash('wrong', 'Phone already registered !');
            return back();
        }
        if (strlen($request->password) < 8) {
            session()->flash('wrong', 'Password length at least 8 words ! ');
        }
        if ($request->password != $request->confirm_password) {
            session()->flash('wrong', 'Password do not match !');
        }
        $this->validate(request(), [

            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $uploadedfile = $request->file('image');
        $new_image = rand() . '.' . $uploadedfile->getClientOriginalExtension();
        $uploadedfile->move(public_path('/assets/images/admin/'), $new_image);

        $data = array();
        $data['full_name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['role'] = $request->type;
        $data['profile_photo_path'] = $new_image;
        $data['password'] = Hash::make($request->password);
        if ($request->type == '1') {
            $role = "Super Admin";
        } else if ($request->type == '2') {
            $role = ' Admin';
        }
        $insert = DB::table('users')->insert($data);
        $details = [
            'title' => 'Mail from  Admin',
            'body' => 'congrats ! you are selected as a ' . $role .
                ' by Admin Panel.Your Email ID - ' . $request->email . ' & Password - ' . $request->password,
        ];
        MaiL::to($request->email)->send(new \App\Mail\UserAddedMail($details));
        session()->flash('success', 'Admin added successfully !');
        return back();
    }
    public function delete_admin($id)
    {
        $my_id = Null;
        if (Auth::user()->id == $id) {
            $my_id = 'yes';
        }
        $details = [
            'title' => 'Mail from  NPS Admin',
            'body' => 'Sorry ! You have been fired from your job by Admin Panel.So, your account is deleted by NPS Admin Panel.',
        ];



        Mail::to(Auth::user()->email)->send(new \App\Mail\UserAddedMail($details));

        $delete = DB::table('users')->where('id', $id)->delete();


        if ($my_id == "yes") {

            return redirect()->route('login');
        }

        session()->flash('success', 'Admin deleted successfully !');
        return back();
    }
    public function edit_admin($id)
    {
        $admin = DB::table('users')->where('id', $id)->get();
        return view('admin.edit_admin', compact('admin'));
    }
    public function edit_admin_process(Request $request, $id)
    {
        $previous_position = DB::table('users')->where('id', $id)->value('role');
        $email = DB::table('users')->where('email', $request->email)->where('id', '!=', $id)->count();
        if ($email > 0) {
            session()->flash('wrong', 'Email already registered !');
            return back();
        }
        $phone = DB::table('users')->where('phone', $request->phone)->where('id', '!=', $id)->count();


        if ($phone > 0) {

            session()->flash('wrong', 'Phone already registered !');
            return back();
        }
        $data = array();
        $data['full_name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['usertype'] = $request->type;
        if ($request->image != NULL) {

            $this->validate(request(), [

                'image' => 'mimes:jpeg,jpg,png',
            ]);


            $uploadedfile = $request->file('image');
            $new_image = rand() . '.' . $uploadedfile->getClientOriginalExtension();
            $uploadedfile->move(public_path('/assets/images/admin/'), $new_image);
            $data['profile_photo_path'] = $new_image;
        }
        if ($request->type == '1') {


            $role = "Super Admin";
        } else if ($request->type == '2') {


            $role = " Admin";
        }



        $update = DB::table('users')->where('id', $id)->Update($data);

        if ($update) {
            $details = [
                'title' => 'Mail from Admin',
                'body' => 'Congrats ! Your information is updated by NPS Admin Panel.',
            ];


            if (($request->type != NULL && $request->type < $previous_position)) {


                $details = [
                    'title' => 'Mail from Admin',
                    'body' => 'Congrats ! You are promoted for a ' . $role . ' position. of NPS by NPS Admin Panel.',
                ];
            } else if (($request->type != NULL && $request->type > $previous_position)) {


                $details = [
                    'title' => 'Mail from NPS Admin',
                    'body' => 'Sorry ! You are depromoted for a ' . $role . ' position.  of NPS by NPS Admin Panel.',
                ];
            }


            Mail::to($request->email)->send(new \App\Mail\UserAddedMail($details));


            session()->flash('success', 'Admin updated successfully !');
        } else {

            session()->flash('wrong', 'Already same info exits !');
        }


        return back();
    }


    public function viewPendingProposals()
    {
        $pendingProposals = Stage::whereNull('accepted_by_admin')->get();

        return view('admin.pending_proposals', compact('pendingProposals'));
    }

    public function approveProposal(Request $request, $proposalId)
    {
        $status = $request->input('status');

        $proposal = Stage::find($proposalId);

        if (!$proposal) {
            return redirect()->back()->with('error', 'Proposal not found.');
        }

        if ($status === 'approve') {
            // Update the proposal as approved by the admin
            $proposal->accepted_by_admin = true;
            // Send the company an assignment letter
            // Set other approval data
        } elseif ($status === 'reject') {
            // Update the proposal as rejected by the admin
            $proposal->rejected_by_admin = true;
            // Set other rejection data
        }

        $proposal->save();

        return redirect()->back()->with('success', 'Proposal reviewed successfully.');
    }
}
