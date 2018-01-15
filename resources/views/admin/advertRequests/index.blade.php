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
                        @foreach ($advertRequests as $advert)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $advert->title }}</td>
                                <td>{{ $advert->body }}</td>
                                <td>{{ $advert->user->name }}</td>
                                <td>{{ $advert->company->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $advertRequests->links() }}
        </div>
    </div>

    <script>
        $("#advert_requests").addClass("active");
    </script>

@stop
