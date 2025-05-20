@extends('layouts.app')
@section('content')
<h1>School Details</h1>

<p><strong>ID:</strong> {{ $school->id }}</p>
<p><strong>Name:</strong> {{ $school->name }}</p>
<p><strong>Created at:</strong> {{ $school->created_at }}</p>
<p><strong>Updated at:</strong> {{ $school->updated_at }}</p>

<a href="{{ route('schools.edit', $school->id) }}">Edit</a>
<form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<a href="{{ route('schools.index') }}">Back to list</a>
@endsection