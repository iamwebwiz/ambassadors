@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h1>My Publications</h1>
            <div class="card">
                <div class="content">
                    <div class="table-responsive">
                        <table class="table table-hover table-hover">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Client</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody>
                                @forelse ($publications as $publication)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $publication->title }}</td>
                                        <td>
                                            <a href="{{ $publication->description }}" target="_blank">
                                                {{ $publication->description }}
                                            </a>
                                        </td>
                                        <td>{{ $publication->advertRequest->user->name }}</td>
                                        <td>{{ $publication->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @empty
                                    You have not published anything at this time.
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $publications->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $('#publications').addClass('active');
</script>
@endsection
