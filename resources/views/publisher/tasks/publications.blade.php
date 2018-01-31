@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">{{ $advert->title }} (Publications)</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#modal-default">
                                    New Publication
                                </button>
                            </div>
                        </div>
                    </div>
                    @if ($publications->count() > 0)
                        @foreach ($publications as $publication)
                            <div class="panel panel-primary">
                                <div class="panel-heading">{{ $publication->title }}</div>
                                <div class="panel-body">{!! $publication->description !!}</div>
                                <div class="panel-footer">Published on {{ $publication->created_at->format('d/m/Y') }}</div>
                            </div>
                        @endforeach
                    @else
                        <h3 class="text-info text-center">No Pulbications made for this task yet</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">New Publication for {{ $advert->title }}</h4>
          </div>
          <div class="modal-body">
            <form action="/" role="form" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="5" class="form-control" placeholder="Description"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Publication</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
