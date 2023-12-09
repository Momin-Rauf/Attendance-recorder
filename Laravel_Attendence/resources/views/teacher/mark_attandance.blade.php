<!-- teacher/mark_attendance.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Mark Attendance for Session: {{ $session->starttime }} - {{ $session->endtime }}</h1>

    <form action="{{ route('teacher.storeAttendance', $session->id) }}" method="post">
        @csrf

        <!-- Add form fields for marking attendance -->

        <button type="submit">Submit Attendance</button>
    </form>
@endsection
