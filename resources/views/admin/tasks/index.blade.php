@extends('layouts.admin')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title }}
                <small>Advert Request Matches to Publishers</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tasks</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-body">
                    @include('flash::message')
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Advert</th>
                            <th>Publisher Assigned</th>
                            <th>Date Assigned</th>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($task->advertRequest->title) }}</td>
                                    <td>{{ title_case($task->user->name) }}</td>
                                    <td>{{ $task->created_at }}</td>
                                    <td>
                                        <form action="{{ route('deleteMatching', ['task'=>$task->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger deleteMatching">
                                                Delete Matching
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                Nothing to show here so far.
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@stop

@section('script')
    <script>
        $("#tasks").addClass("active");

        $('button.deleteMatching').on('click', function(event) {
            // console.log(event);
            var response = confirm("Do you really want to delete this matching?");

            if (response === true) {
                return true;
            } else {
                return false;
            }
        });
    </script>
@stop
