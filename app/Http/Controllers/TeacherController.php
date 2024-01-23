<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function viewStudentStageRequests()
    {
        $teacherId = auth()->user()->id;
        $studentStageRequests = Stage::where('encadrant_id', $teacherId)
            ->whereNull('accepted_by_teacher')
            ->whereNull('rejected_by_teacher')
            ->get();

        return view('teacher.student_stage_requests', compact('studentStageRequests'));
    }

    public function reviewStudentStage(Request $request, $stageId)
    {
        $status = $request->input('status');

        $stage = Stage::find($stageId);

        if (!$stage) {
            return redirect()->back()->with('error', 'Stage request not found.');
        }

        if ($status === 'accept') {
            // Update the student's stage request as accepted by the teacher
            $stage->accepted_by_teacher = true;
            // Set other accepted data
        } elseif ($status === 'reject') {
            // Update the student's stage request as rejected by the teacher
            $stage->rejected_by_teacher = true;
            // Set other rejection data
        }

        $stage->save();

        return redirect()->route('teacher.stage.requests')->with('success', 'Stage request reviewed successfully.');
    }
}
