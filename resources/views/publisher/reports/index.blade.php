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
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                {{-- <a href="{{ route('newReportForm',['task'=>$task->match_id,'id'=>$publication->id]) }}"
                                    class="btn btn-default btn-fill">
                                    New Report
                                </a> --}}
                                <button class="btn btn-dark btn-fill pull-right waves-effect waves-light" data-target="#exampleNifty3dSlit"
                                data-toggle="modal" type="button">
                                    New Report
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if (count($reports) < 1)
                        <h3 class="text-info text-center">No report for this publication yet.</h3>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Screenshot</th>
                                <th>Date Added</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ Storage::url($report->filepath) }}" alt="" width="80px" class="img-thumbnail">
                                        </td>
                                        <td>{{ $report->created_at->format('jS F Y') }}</td>
                                        <td>
                                            <a href="{{ Storage::url($report->filepath) }}" target="_blank" class="btn btn-dark">
                                                View Full Image
                                            </a>
                                            <a href="{{ route('publisher.deleteReport', ['id' => $report->id]) }}"
                                                class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                    <h4 class="modal-title">Make New Report</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('addNewReport', ['task'=>$task->match_id,'id'=>$publication->id]) }}"
                        method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" required name="image" accept="image/*" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-pure margin-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Upload Report</button>
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
        var res = confirm('Delete this report?');
        if (res === true) {
            return true;
        } else {
            return false;
        }
    });
</script>
@endsection
