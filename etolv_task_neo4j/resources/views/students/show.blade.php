@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Details</h1>

    <p><strong>Name:</strong> {{ $student['name'] }}</p>
    <p><strong>School:</strong> {{ $student['school']['name'] ?? 'N/A' }}</p>

    <p><strong>Subjects:</strong></p>
    @if (!empty($student['subjects']))
    <ul>
        @foreach ($student['subjects'] as $subject)
        <li>{{ $subject['name'] }}</li>
        @endforeach
    </ul>
    @else
    <p>No subjects enrolled.</p>
    @endif

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
</div>
@endsection