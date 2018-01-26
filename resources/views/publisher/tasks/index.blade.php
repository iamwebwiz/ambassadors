@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-primary">My Tasks</h1>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table table-striped">
                        {{ $tasks }}
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
