@extends('layouts.users')

@section('body')

<div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">Reports</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <a href="#"
                                    class="btn btn-default btn-fill">
                                    New Report
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $('#tasks').addClass('active');
</script>
@endsection
