@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $student->name }}" required>
    </div>

    <div>
        <label for="school_id">School:</label>
        <select name="school_id" required>
            @foreach($schools as $school)
            <option value="{{ $school->id }}" {{ $school->id == $student->school_id ? 'selected' : '' }}>
                {{ $school->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="subject_ids">Subjects:</label>
        <select name="subject_ids[]" multiple>
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $student->subjects->contains($subject->id) ? 'selected' : '' }}>
                {{ $subject->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Update</button>
</form>
@endsection