@extends('layouts.admin')

@section('body')

    @foreach ($users as $client)
        {{ $client->name }} <br>
    @endforeach

@stop
