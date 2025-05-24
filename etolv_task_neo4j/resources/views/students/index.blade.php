@extends('layouts.app')
@section('content')
<h1>Students</h1>

<a href="{{ route('students.create') }}">Create New Student</a>
<br>
<br>
<a href="{{ route('students.paginated') }}">Test Paginated</a><br>

<div class="mb-3">
    <a href="{{ route('students.paginated') }}" class="btn btn-secondary">View Paginated List</a>
</div>
<br>
<br>
<ul>
    @foreach($students as $student)
    <li>
        {{ $student['name'] }} |

        <a href="{{ route('students.show', $student['id']) }}">View</a>
        <a href="{{ route('students.edit', $student['id']) }}">Edit</a>
        <form action="{{ route('students.destroy', $student['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

    </li>
    @endforeach
</ul>
@endsection