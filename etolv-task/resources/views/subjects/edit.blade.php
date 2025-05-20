@extends('layouts.app')

@section('content')
<h1>Edit Subject</h1>

<form action="{{ route('subjects.update', $subject->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Subject Name:</label>
        <input type="text" name="name" value="{{ $subject->name }}" required>
    </div>

    <button type="submit">Update</button>
</form>
@endsection