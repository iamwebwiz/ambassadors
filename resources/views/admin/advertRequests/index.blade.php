@extends('layouts.admin')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Advertisement Requests
                <small>Requests made by clients for marketing</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Advert Requests</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-body">
                    @if (count($requests) > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Client</th>
                                <th>Company</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($requests as $advert)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($advert->title) }}</td>
                                        <td>{{ ucfirst($advert->body) }}</td>
                                        <td>{{ title_case($advert->user->name) }}</td>
                                        <td>{{ $advert->company->name }}</td>
                                        <td>
                                            <?php
                                                switch ($advert->status) {
                                                    case "Pending":
                                                        echo "<div class='label label-default'>Pending</div>";
                                                        break;
                                                    case "Matched":
                                                        echo "<div class='label label-warning'>Matched</div>";
                                                        break;
                                                    case "Processing":
                                                        echo "<div class='label label-info'>Processing</div>";
                                                        break;
                                                    case "Finished":
                                                        echo "<div class='label label-success'>Finished</div>";
                                                        break;
                                                    default:
                                                        echo "";
                                                }
                                            ?>
                                        </td>
                                        @if ($advert->status == "Pending")
                                            <td>
                                                <a href="{{ route('matchAdvertToPublisher', ['advert'=>$advert->id]) }}"
                                                    class="btn btn-sm btn-default">
                                                    Assign Publisher
                                                </a>
                                            </td>
                                        @endif
                                        @if ($advert->status == "Processing")
                                            <td>
                                                <a href="/" class="btn btn-sm btn-default">
                                                    View Work Progress
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $requests->links() }}
                    @else
                        <h3 class="text-center text-info">No Requests Made At This Moment</h3>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@stop

@section('script')
    <script>
        $("#advertRequests").addClass("active");
    </script>
@stop
