@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $student['name'] }}" required><br><br>

    <label>School:</label>
    <select name="school_id" required>
        @foreach($schools as $school)
        <option value="{{ $school['id'] }}"
            {{ $student['school'] && $school['id'] == $student['school']['id'] ? 'selected' : '' }}>
            {{ $school['name'] }}
        </option>
        @endforeach
    </select>

    <label>Subject:</label>
    <select name="subject_ids[]" multiple>
        @foreach($subjects as $subject)
        <option value="{{ $subject['id'] }}" {{ in_array($subject['id'], $studentSubjectIds) ? 'selected' : '' }}>
            {{ $subject['name'] }}
        </option>
        @endforeach
    </select><br><br>


    <button type="submit">Update</button>
</form>
@endsection