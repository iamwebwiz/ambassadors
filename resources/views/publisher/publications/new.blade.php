@extends('layouts.users')

@section('body')

    <style>
        input[type="text"],
        textarea[name="description"] {
            border: 1px solid gray;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <h1>New Publication</h1>

            <div class="panel panel-default">
                <div class="panel-body">
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
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-lg btn-fill">
                                Add Publication
                            </button>
                        </div>
                    </form>
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
