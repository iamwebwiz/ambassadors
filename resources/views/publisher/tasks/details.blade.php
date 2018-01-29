@extends('layouts.users')

@section('body')

    <style>
        blockquote {
            border-left-color: darkgray;
            border-left-style: solid;
            border-top: 1px solid lightgray;
        }

        .col-sm-3 {
            border-left: 1px outset lightgray;
        }

        .col-sm-3 > form {
            border-bottom: 1px solid lightgray;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-primary page-header">Task Details</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h5>Title: <em>{{ ucfirst($advert_title) }}</em></h5>
                            <h5>Company: <em>{{ ucfirst($task->advertRequest->company->name) }}</em></h5>
                            <h5>Client: <em>{{ title_case($task->advertRequest->company->user->name) }}</em></h5>
                            <h5>Date Assigned: <em>{{ $task->created_at->format('l, d M Y') }}</em></h5>
                        </div>
                        <div class="col-sm-3">
                            <h5>Task Status: <em>{{ $task->advertRequest->status }}</em></h5>

                            <form action="{{ route('changeTaskStatus',['task'=>$task->match_id]) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select name="task_status" class="form-control" style="border:1px solid lightgray">
                                        <option value="">Change Status...</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Finished">Finished</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                            {{-- <hr> --}}
                            <button class="btn btn-success btn-fill btn-block">
                                View Reports
                            </button>
                        </div>
                    </div>

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