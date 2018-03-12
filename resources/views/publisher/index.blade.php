@extends('layouts.publisher')

@section('body')

    <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="widget">
                <div class="widget-content padding-40 bg-blue-500">
                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon fa fa-bookmark" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-left">
                        <div class="counter-number-group">
                            <span class="counter-number">{{ count($publications) }}</span>
                            <span class="counter-number-related text-capitalize">Publications</span>
                        </div>
                        <div class="counter-label text-capitalize">since {{ $user->created_at->format('jS F Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="widget">
                <div class="widget-content padding-40 bg-red-400">
                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon md-assignment" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-left">
                        <div class="counter-number-group">
                            <span class="counter-number">{{ $reports }}</span>
                            <span class="counter-number-related text-capitalize">Reports</span>
                        </div>
                        <div class="counter-label text-capitalize">in {{ count($publications).' publications' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="widget">
                <div class="widget-content padding-40 bg-green-700">
                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon fa fa-tasks" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-left">
                        <div class="counter-number-group">
                            <span class="counter-number">{{ count($tasks) }}</span>
                            <span class="counter-number-related text-capitalize">Tasks</span>
                        </div>
                        <div class="counter-label text-capitalize">since {{ $user->created_at->format('jS F Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Your Referral link:</h4>
                    <input type="text" class="form-control" value="{{ url('register?ref='.$user->name) }}">
                    <h5>Share this link with potential publishers and get paid after 10 referrals</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-bordered panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Recent Tasks</h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <table class="table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>Date Assigned</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($user->getTasks(3) as $task)
                                    <tr>
                                        <td>{{ $task->advertRequest->title }}</td>
                                        <td>{{ $task->created_at->format('jS F, Y') }}</td>
                                        <td>
                                            <?php
                                            switch ($task->advertRequest->status) {
                                                case 'Pending':
                                                    echo "<div class='label label-default'>Pending</div>";
                                                    break;
                                                case 'Matched':
                                                    echo "<div class='label label-warning'>Matched</div>";
                                                    break;
                                                case 'Processing':
                                                    echo "<div class='label label-info'>Processing</div>";
                                                    break;
                                                case 'Finished':
                                                    echo "<div class='label label-success'>Finished</div>";
                                                    break;
                                                default:
                                                    echo "";
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-bordered panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Completed Tasks</h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        @if (count($user->getCompletedTasks()) > 0)
                        <table class="table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>Date Completed</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($user->getCompletedTasks(3) as $completedTask)
                                    <tr>
                                        <td>{{ $completedTask->title }}</td>
                                        <td>{{ $completedTask->updated_at->diffForHumans() }}</td>
                                        <td><div class='label label-success'>Finished</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h4 class="text-center text-danger">You have not completed any task!</h4>
                        @endif
                    </li>
                </ul>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $('#dashboard').addClass('active');
    </script>
@endsection
