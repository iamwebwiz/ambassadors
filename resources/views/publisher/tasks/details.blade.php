@extends('layouts.publisher')

@section('body')

    <style>
        blockquote {
            border-left-color: darkgray;
            border-left-style: solid;
            border-left-width: 5px;
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
            <div class="panel panel-dark panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h3>Title: <small>{{ ucfirst($advert_title) }}</small></h3>
                            <h3>Company: <small>{{ ucfirst($task->advertRequest->company->name) }}</small></h3>
                            <h3>Client: <small>{{ title_case($task->advertRequest->company->user->name) }}</small></h3>
                            <h3>Date Assigned: <small>{{ $task->created_at->format('jS F Y') }}</small></h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Task Status: <small><em>{{ $task->advertRequest->status }}</em></small></h3>

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
                                    <button type="submit" class="btn btn-info btn-fill">Update</button>
                                </div>
                            </form>
                            {{-- <hr> --}}
                            <a class="btn btn-dark btn-block btn-fill"
                            href="{{ route('showTaskPublications',['task'=>$task->match_id]) }}">
                                Publications &amp; Reports
                            </a>
                        </div>
                    </div>

                    <h3>Description</h3>
                    <hr>
                    <blockquote style="font-style: normal">
                        {{ ucfirst($task->advertRequest->body) }}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $('#tasks').addClass('active');
</script>
@endsection
