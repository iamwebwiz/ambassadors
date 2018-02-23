<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to DGAmbassadors &bull; Digital Ambassadors &bull; Soft Work</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">Digital Ambassadors</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="{{ url('login') }}">Login</a></li>
                <li><a href="{{ url('register') }}">Register</a></li>
            </ul>
        </div>
    </nav>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
