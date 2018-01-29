@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-primary page-header">Task Details</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5>Title: <em>{{ ucfirst($advert_title) }}</em></h5>
                    <h5>Company: <em>{{ ucfirst($task->advertRequest->company->name) }}</em></h5>
                    <h5>Client: <em>{{ title_case($task->advertRequest->company->user->name) }}</em></h5>
                    <h5>Date Assigned: <em>{{ $task->created_at->format('l, d M Y') }}</em></h5>

                    <h5 class="page-header">Description</h5>
                    <blockquote style="font-style: normal">
                        {{ ucfirst($task->advertRequest->body) }}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
