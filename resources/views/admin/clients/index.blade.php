@extends('layouts.admin')

@section('body')

    <h1 class="page-header">Clients</h1>
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
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->created_at->format('d/M/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $clients->links() }}
        </div>
    </div>

    <script>
        $('#clients').addClass('active');
    </script>

@stop
