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
                    {{-- @if ($user->publications->count() > 0)
                        <div class="table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Date Added</th>
                                </thead>
                                <tbody>
                                    @foreach ($user->publications as $publication)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $publication->name }}</td>
                                            <td>{{ $publication->address }}</td>
                                            <td>{{ $publication->created_at->format('jS F Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else --}}
                        <h3 class="text-center">No Publications Added Just Yet!</h3>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#publications').addClass('active');
    </script>

@endsection
