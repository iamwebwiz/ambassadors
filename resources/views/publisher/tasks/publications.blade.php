@extends('layouts.publisher')

@section('body')

    <style>
        #tableHeading {
            background: #66615b;
            color: #fff;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ ucfirst($advert->title) }} (Publications)</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                {{-- <a href="{{ route('makeNewPublication',['task'=>$task->match_id]) }}"
                                    class="btn btn-dark btn-fill">
                                    New Publication
                                </a> --}}
                                <button class="btn btn-dark btn-fill pull-right waves-effect waves-light" data-target="#exampleNifty3dSlit"
                                data-toggle="modal" type="button">
                                    New Publication
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($publications->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Date Added</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($publications as $publication)
                                    <tr>
                                        <td>{{ $publication->title }}</td>
                                        <td>
                                            <a href="{{ $publication->description }}" target="_blank">
                                                {{ $publication->description }}
                                            </a>
                                        </td>
                                        <td>{{ $publication->created_at->format('jS F Y') }}</td>
                                        <td>
                                            <a href="{{ route('showPublicationReports',['task'=>$task->match_id, 'id'=>$publication->id]) }}"
                                                class="btn btn-dark btn-fill">
                                                Reports
                                            </a>
                                            <a href="{{ route('publisher.deletePublication', ['id'=>$publication->id]) }}" class="btn btn-danger delete" type="button">
                                                <i class="fa fa-trash"></i>
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

    <!-- Modal -->
    <div class="modal fade modal-3d-slit" id="exampleNifty3dSlit" aria-hidden="true"
    aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add A New Publication</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('addNewPublication',['task'=>$task->match_id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="company" value="{{ $advert->company->name }}"
                            class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Advert</label>
                            <input type="text" name="advert" value="{{ $advert->title }}" class="form-control"
                            readonly>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" placeholder="Title" class="form-control"
                            value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label>URL <small>(This is to be copied from the publication made)</small></label>
                            <input type="text" name="description" placeholder="URL" class="form-control"
                            value="{{ old('description') }}">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-pure margin-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Publication</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection

@section('scripts')
<script>
    $('#tasks').addClass('active');
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
