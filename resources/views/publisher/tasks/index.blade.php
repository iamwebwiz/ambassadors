@extends('layouts.users')

@section('body')

    <style>
        #tableHeading {
            background: #66615b;
            color: #fff;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-primary">My Tasks</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead id="tableHeading">
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Company</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Date Assigned</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($task->advertRequest->title) }}</td>
                                    <td>{{ ucfirst($task->advertRequest->company->name) }}</td>
                                    <td>{{ title_case($task->advertRequest->company->user->name) }}</td>
                                    <td>{{ $task->created_at->format('l, d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('showTaskDetail',['task'=>$task->match_id]) }}"
                                            class="btn btn-default btn-fill btn-sm">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                {{ title_case("you have not been given any task yet.") }}
                            @endforelse
                        </tbody>
                    </table>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
