@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-primary">My Tasks</h1>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table table-striped table-full-width">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Client</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($task->advertRequest->title) }}</td>
                                    <td>{{ ucfirst($task->advertRequest->company->name) }}</td>
                                    <td>{{ title_case($task->advertRequest->company->user->name) }}</td>
                                    <td>
                                        <a href="/" class="btn btn-info btn-fill btn-sm">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
