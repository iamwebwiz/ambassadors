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

            <h1 class="page-heading">Publishers</h1>
            <div class="card">
                <div class="content">
                    <div class="table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Joined</th>
                            </thead>
                            <tbody>
                                @foreach ($publishers as $publisher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $publisher->name }}</td>
                                        <td>{{ $publisher->email }}</td>
                                        <td>{{ $publisher->created_at->format('d/M/Y') }}</td>
                                        <td>
                                            <a href="/" class="btn btn-fill btn-info">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $publishers->links() }}
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <script>
        $('#users').addClass('active');
    </script>

@stop
