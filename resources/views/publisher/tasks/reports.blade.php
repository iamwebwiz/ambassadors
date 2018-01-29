@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">{{ $advert->title }} (Publications)</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
