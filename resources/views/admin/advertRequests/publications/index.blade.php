@extends('layouts.admin')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Publications
                <small>Publications made</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.advertRequests') }}">Advert Requests</a></li>
                <li class="active">Publications</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-body">
                    @include('flash::message')
                    @if (count($publications) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Date Created</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($publications as $publication)
                                    <tr>
                                        <td>{{ $publication->title }}</td>
                                        <td>
                                            <a href="{{ $publication->description }}" target="_blank">
                                                {{ $publication->description }}
                                            </a>
                                        </td>
                                        <td>{{ $publication->created_at->format('jS F Y') }}</td>
                                        <td>
                                            <a href="{{ route('getPublicationReports',['advert'=>$advert->id,'id'=>$publication->id]) }}"
                                                class="btn btn-link">Reports</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deletePublication',['id'=>$advert->id,'publication'=>$publication->id]) }}"
                                                class="btn btn-danger delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-info text-center">No Publications has been made for this advert.</h3>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@stop

@section('scripts')
    <script>
        $('#advertRequest').addClass('active');

        $('a.delete').click(function(e) {
            var response = confirm("Do you really want to delete this publication?");
            if (response === true) {
                return true;
            } else {
                return false;
            }
        });
    </script>
@stop
