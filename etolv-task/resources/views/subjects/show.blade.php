@extends('layouts.app')

@section('content')
<h1>Subject Details</h1>

<p><strong>ID:</strong> {{ $subject->id }}</p>
<p><strong>Name:</strong> {{ $subject->name }}</p>
<p><strong>Students:</strong>
<ul>
    @foreach($subject->students as $student)
    <li>{{ $student->name }}</li>
    @endforeach
</ul>
</p>

<a href="{{ route('subjects.edit', $subject->id) }}">Edit</a>
<form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<a href="{{ route('subjects.index') }}">Back</a>
@endsection