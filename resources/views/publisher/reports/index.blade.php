@extends('layouts.users')

@section('body')

<style>
    #tableHeading {
        background: #66615b;
        color: #fff;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-primary">Reports</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right">
                            <a href="{{ route('newReportForm',['task'=>$task->match_id,'id'=>$publication->id]) }}"
                                class="btn btn-default btn-fill">
                                New Report
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                @if (count($reports) < 1)
                    <h3 class="text-info text-center">No report for this publication yet.</h3>
                @else
                    <table class="table table-hover">
                        <thead id="tableHeading">
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
                                    <td><a href="{{ Storage::url($report->filepath) }}" target="_blank" class="btn btn-link">View Full Image</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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
