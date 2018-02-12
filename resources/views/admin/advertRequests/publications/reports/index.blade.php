@extends('layouts.admin')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title }}
                <small>Periodic Reports provided by the publisher</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.advertRequests') }}">Advert Requests</a></li>
                <li><a href="{{ route('getAdvertPublications',['id'=>$advert->id]) }}">Publications</a></li>
                <li class="active">Reports</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-body">
                    @include('flash::message')
                    @if (count($reports) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Screenshot</th>
                                <th>Date Added</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($report->filepath) }}" class="img-thumbnail"
                                            alt="" width="80px">
                                        </td>
                                        <td>{{ $report->created_at->format('jS F Y') }}</td>
                                        <td>
                                            <a href="{{ Storage::url($report->filepath) }}" target="_blank"
                                                class="btn btn-primary">
                                                View Full Image
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-info text-center">No report has been made for this publication.</h3>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        $('#advertRequest').addClass('active');
    </script>
@endsection
