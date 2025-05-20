@extends('layouts.app')

@section('content')
<h1>Student Details</h1>

<p><strong>ID:</strong> {{ $student->id }}</p>
<p><strong>Name:</strong> {{ $student->name }}</p>
<p><strong>School:</strong> {{ $student->school->name }}</p>
<p><strong>Subjects:</strong>
<ul>
    @foreach($student->subjects as $subject)
    <li>{{ $subject->name }}</li>
    @endforeach
</ul>
</p>

<a href="{{ route('students.edit', $student->id) }}">Edit</a>
<form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
@endsection