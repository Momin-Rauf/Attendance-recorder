<!-- resources/views/student/view_session_attendance.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Session Attendance for {{ $session->date_marked_for->format('Y-m-d') }}</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendance as $record)
                    <tr>
                        <td>{{ $record->isPresent ? 'Present' : 'Absent' }}</td>
                        <td>{{ $record->comments }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
    