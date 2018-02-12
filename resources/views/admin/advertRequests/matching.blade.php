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
                    @include('flash::message')
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @forelse($publishers as $publisher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ title_case($publisher->name) }}</td>
                                    <td>{{ $publisher->email }}</td>
                                    <td>
                                        <form action="{{ route('doMatching', [
                                            'advert' => $advert->id,
                                            'publisher' => $publisher->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-info">Match</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                No publisher to display here yet.
                            @endforelse
                        </tbody>
                    </table>
                    {{ $publishers->links() }}
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@stop

@section('script')
    <script>
        $("#advertRequests").addClass("active");
    </script>
@stop
