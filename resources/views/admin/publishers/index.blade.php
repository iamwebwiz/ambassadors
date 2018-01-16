@extends('layouts.admin')

@section('body')

    <h1 class="page-header">Publishers</h1>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $publishers->links() }}
        </div>
    </div>

    <script>
        $('#publishers').addClass('active');
    </script>

@stop
