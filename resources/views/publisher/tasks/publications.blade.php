@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">{{ ucfirst($advert->title) }} (Publications)</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <a href="{{ route('makeNewPublication',['task'=>$task->match_id]) }}" class="btn btn-primary btn-fill">
                                    New Publication
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($publications->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody>
                                @foreach($publications as $publication)
                                    <tr>
                                        <td>{{ $publication->title }}</td>
                                        <td>{!! $publication->description !!}</td>
                                        <td>{{ $publication->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-default btn-fill">
                                                Reports
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-info text-center">No Publications made for this task yet</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" role="dialog">
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
