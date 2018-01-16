@extends('layouts.admin')

@section('body')

    <h1 class="page-header">Advert Requests</h1>
    <div class="card">
        <div class="content">
            <div class="table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Client</th>
                        <th>Company</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $client)
                            @if ($client->hasRole('client'))
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $client['name'] }}</td>
                                    <td>{{ $client['email'] }}</td>
                                    <td>{{ $client->role()->name }}</td>
                                    <td>{{ $client['created_at']->format('d/M/Y') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#clients').addClass('active');
    </script>

@stop
