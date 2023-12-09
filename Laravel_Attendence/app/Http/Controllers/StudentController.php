<?php
// StudentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendence;

class StudentController extends Controller
{
    public function dashboard()
    {
        // Add authentication check if needed
        $user = auth()->user();

        // Assuming user is a student
        $studentId = $user->id;

        // Get attendance records for the student
        $attendance = Attendence::where('studentid', $studentId)->get();

        return view('student.dashboard', compact('user', 'attendance'));
    }
}

