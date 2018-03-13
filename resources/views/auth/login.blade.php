@extends('layouts.guest')

@section('content')

<header class="section bg-gradient">
    <div class="container mt-5">
        <h1>Login</h1>
    </div>
</header>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-sm-8 offset-sm-2 text-center">
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(function(){
        $('a#login').addClass('active');
    });
</script>

@endsection
