@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-sm-12">
            <h1>My Publications</h1>
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('client.newPublication') }}" class="pull-right btn btn-primary">
                                New Publication
                            </a>
                        </div>
                    </div>
                    <br><br>
                    @if ($user->advertRequests->count() > 0)
                        <div class="table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Company</th>
                                    <th>Date Added</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($user->advertRequests as $advert)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $advert->title }}</td>
                                            <td>{{ str_limit($advert->body, $limit = 30, $end = '...') }}</td>
                                            <td>{{ $advert->company->name }}</td>
                                            <td>{{ $advert->created_at->format('jS F Y') }}</td>
                                            <td>{{ $advert->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-center">No Publications Added Just Yet!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#publications').addClass('active');
    </script>

@endsection
