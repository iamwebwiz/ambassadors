@extends('layouts.admin')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-body">
                    @if (count($requests) > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Client</th>
                                <th>Company</th>
                            </thead>
                            <tbody>
                                @foreach ($requests as $advert)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($advert->title) }}</td>
                                        <td>{{ ucfirst($advert->body) }}</td>
                                        <td>{{ title_case($advert->user->name) }}</td>
                                        <td>{{ $advert->company->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $requests->links() }}
                    @else
                        <h1 class="text-center text-primary">No Requests Made At This Moment</h1>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <script>
        $("#advertRequests").addClass("active");
    </script>

@stop
