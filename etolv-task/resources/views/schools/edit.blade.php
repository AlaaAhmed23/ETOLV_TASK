@extends('layouts.app')

@section('content')
<h1>Edit School</h1>

<form action="{{ route('schools.update', $school->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">School Name:</label>
        <input type="text" name="name" value="{{ old('name', $school->name) }}" required>
    </div>

    <button type="submit">Update School</button>
</form>
@endsection