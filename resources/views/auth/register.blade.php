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
                <form class="form-horizontal" action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Account type</label>
                        <select name="account_type" class="form-control">
                            <option value="" {{ isset($_GET['ref']) ? "disabled" : "" }} readonly>Choose Account Type</option>
                            <option value="client" {{ isset($_GET['ref']) ? "disabled" : "" }}>Business Owner</option>
                            <option value="publisher" {{ isset($_GET['ref']) ? "selected" : "" }}>Publisher</option>
                        </select>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus
                        placeholder="Full Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                        placeholder="E-mail Address">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <label>Referrer</label>
                        <input type="text" name="referrer" value="{{ isset($_GET['ref']) ? $_GET['ref'] : '' }}" class="form-control" readonly
                        placeholder="This field is filled automatically">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
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
        $('a#register').addClass('active');
    });
</script>

@endsection
