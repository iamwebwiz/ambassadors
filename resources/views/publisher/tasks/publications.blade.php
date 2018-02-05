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
            <h2 class="text-primary">{{ ucfirst($advert->title) }} (Publications)</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <a href="{{ route('makeNewPublication',['task'=>$task->match_id]) }}"
                                    class="btn btn-default btn-fill">
                                    New Publication
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($publications->count() > 0)
                        <table class="table table-hover table-bordered">
                            <thead id="tableHeading">
                                <th class="text-center">Title</th>
                                <th class="text-center">Content</th>
                                <th class="text-center">Date Added</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($publications as $publication)
                                    <tr class="text-center">
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

    <script>
        $('#tasks').addClass('active');
    </script>

@endsection
