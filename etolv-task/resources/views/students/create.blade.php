@extends('layouts.app')

@section('content')
<h1>Create Student</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label for="school_id">School:</label>
        <select name="school_id" required>
            @foreach($schools as $school)
            <option value="{{ $school->id }}">{{ $school->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="subject_ids">Subjects:</label>
        <select name="subject_ids[]" multiple>
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Create</button>
</form>
@endsection