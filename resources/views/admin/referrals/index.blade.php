@extends('layouts.admin')

@section('body')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Referrals
            <small><!-- Business Marketers --></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('#') }}"><i class="fa fa-users"></i> Users</a></li>
            <li><a href="{{ route('showAllPublishers') }}">Publishers</a></li>
            <li class="active">Referrals</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Date Registered</th>
                        </thead>
                        <tbody>
                            @foreach ($referrals as $ref)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ref->username }}</td>
                                    <td>{{ $ref->created_at->toDateString() }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

@section('scripts')
<script>
    $(function(){
        $('#users, #publishers').addClass('active');
    });
</script>
@endsection
