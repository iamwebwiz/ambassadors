@extends('layouts.publisher')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">New Report <small>Add a new report</small></h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('addNewReport', ['task'=>$task->match_id,'id'=>$publication->id]) }}"
                        method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="btn btn-lg btn-default btn-fill">
                                <input type="file" required name="image" accept="image/*" class="form-control" style="display: none">
                                <i class="fa fa-camera"></i> Select Image
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">
                                Upload Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#tasks').addClass('active');
    </script>
@endsection
