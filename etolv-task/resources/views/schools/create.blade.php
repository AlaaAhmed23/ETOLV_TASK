@extends('layouts.app')

@section('content')
<h1>Create School</h1>
<form method="POST" action="{{ route('schools.store') }}">
    @csrf
    <input type="text" name="name" placeholder="School Name">
    <button type="submit">Create</button>
</form>
@endsection