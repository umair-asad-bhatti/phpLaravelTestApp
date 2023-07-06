@php
    $session_user = session('user');
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add a Record</title>
</head>

<body>
    <nav class="navbar align-center p-3 navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Navbar</span>
        @if ($session_user)
            <a class="nav-link" href="{{ route('records.index') }}">Home</a>
            <form action="/handleLogout" method="post">
                @csrf
                <input class="btn  btn-light" type="submit" name="logout" value="logout">
            </form>
            <a href="{{ route('records.create') }}">
                <input id="addBtn" class="btn btn-light" type="button" value="Add Record">
            </a>
        @endif
    </nav>
