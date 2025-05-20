@extends('layouts.app')

@section('content')
<h1>Create Subject</h1>

<form action="{{ route('subjects.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Subject Name:</label>
        <input type="text" name="name" required>
    </div>

    <button type="submit">Create</button>
</form>
@endsection