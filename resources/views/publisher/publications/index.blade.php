@extends('layouts.publisher')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-hover">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Client</th>
                                <th>Date Added</th>
                                <th></th>
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
                                        <td>{{ $publication->created_at->format('jS F Y') }}</td>
                                        <td>
                                            <a href="{{ route('publisher.deletePublication', ['id'=>$publication->id]) }}"
                                                class="btn btn-danger delete" type="button">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
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

@section('scripts')
<script>
    $('#publications').addClass('active');
    $('a.delete').click(function() {
        var res = confirm('Delete this publication?');
        if (res === true) {
            return true;
        } else {
            return false;
        }
    });
</script>
@endsection
