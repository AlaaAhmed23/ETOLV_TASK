<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Optional CSS --}}
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    nav a {
        margin-right: 10px;
    }

    form {
        display: inline;
    }
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('schools.index') }}">Schools </a>
        <a href="{{ route('students.index') }}">Students </a>
        <a href="{{ route('subjects.index') }}">Subjects </a>
    </nav>

    <hr>

    @yield('content')

</body>

</html>