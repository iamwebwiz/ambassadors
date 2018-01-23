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
            {{--  --}}
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <script>
        $('#companies').addClass('active');
    </script>

@stop
