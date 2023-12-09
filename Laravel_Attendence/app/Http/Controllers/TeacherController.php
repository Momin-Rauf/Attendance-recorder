<?php

// TeacherController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use App\Models\Session;
use App\Models\Attendence;

class TeacherController extends Controller
{
    public function dashboard()
    {
        // Add authentication check if needed
        $user = auth()->user();

        // Assuming user is a teacher
        $teacherId = $user->id;

        // Get all classes taught by the teacher
        $classes = Classes::where('teacherid', $teacherId)->get();

        // Get upcoming and previous sessions for each class
        foreach ($classes as $class) {
            $class->sessions = Session::where('class_id', $class->id)
                ->orderBy('starttime', 'asc')
                ->get();
        }

        return view('teacher.dahboard', compact('user', 'classes'));
    }

    public function markAttendance($sessionId)
    {
        // Add authentication check if needed
        $user = auth()->user();

        // Assuming user is a teacher
        $teacherId = $user->id;

        // Find the session
        $session = Session::findOrFail($sessionId);

        // Get students for the class
        $students = User::where('class', $session->class_id)
            ->where('role', 'student')
            ->get();

        return view('teacher.mark_attendance', compact('user', 'session', 'students'));
    }

    public function storeAttendance(Request $request, $sessionId)
    {
        // Add validation for form data
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'is_present' => 'required|boolean',
            'comments' => 'nullable|string|max:200',
        ]);

        // Find the session
        $session = Session::findOrFail($sessionId);

        // Mark attendance
        Attendance::updateOrCreate(
            ['class_id' => $session->class_id, 'studentid' => $request->input('student_id')],
            [
                'isPresent' => $request->input('is_present'),
                'comments' => $request->input('comments'),
                'date_marked_for' => now(),
            ]
        );

        return redirect()->route('teacher.dashboard')->with('success', 'Attendance marked successfully');
    }
}

?>
