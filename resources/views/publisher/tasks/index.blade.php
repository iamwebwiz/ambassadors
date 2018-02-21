@extends('layouts.publisher')

@section('body')

    <style>
        #tableHeading {
            background: #66615b;
            color: #fff;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Client</th>
                            <th>Date Assigned</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($task->advertRequest->title) }}</td>
                                    <td>{{ ucfirst($task->advertRequest->company->name) }}</td>
                                    <td>{{ title_case($task->advertRequest->company->user->name) }}</td>
                                    <td>{{ $task->created_at->format('jS F Y') }}</td>
                                    <td>
                                        <a href="{{ route('showTaskDetail',['task'=>$task->match_id]) }}"
                                            class="btn btn-dark btn-fill">
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

@endsection

@section('scripts')
<script>
    $('#tasks').addClass('active');
</script>
@endsection
