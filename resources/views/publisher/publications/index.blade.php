@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h1>My Publications</h1>
            <div class="card">
                <div class="content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Client</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody>
                                @forelse ($publications as $publication)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $publication->title }}</td>
                                        <td>{{ $publication->description }}</td>
                                        <td>{{ $publication->company_id }}</td>
                                        <td>{{ $publication->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @empty
                                    YOU ARE YET TO PUBLISH ANYTHING
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $publications->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#publications').addClass('active');
    </script>

@endsection
