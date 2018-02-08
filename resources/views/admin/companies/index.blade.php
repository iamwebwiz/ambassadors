@extends('layouts.admin')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Companies
                <small>Client&rsquo;s Businesses</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Companies</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-body">
                    @if (count($companies) > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Owner</th>
                                <th>Date Registered</th>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($company->name) }}</td>
                                        <td>{{ ucfirst($company->address) }}</td>
                                        <td>{{ title_case($company->user->name) }}</td>
                                        <td>{{ $company->created_at->format('d/M/Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit</a></li>
                                                    <li><a href="#" id="deleteClient">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    @else
                        <h3 class="text-info text-center">No Companies Registered Yet</h3>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@stop

@section('script')
    <script>
        $('#companies').addClass('active');
    </script>
@stop
