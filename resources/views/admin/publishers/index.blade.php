@extends('layouts.admin')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Publishers
                <small>Business Marketers</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url('#') }}"><i class="fa fa-users"></i> Users</a></li>
                <li class="active">Publishers</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-header with-border">
                    {{-- <div class="box-title">DGAmbassadors Clients</div> --}}
                    {{-- <a href="#" class="pull-right btn btn-primary">Add New Client</a> --}}
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-default">
                        Add New Publisher
                    </button>
                </div>
                {{-- <div class="table-responsive"> --}}
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td>{{ $publisher->email }}</td>
                                    <td>{{ $publisher->created_at->format('d/M/Y') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Action</button>
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Edit</a></li>
                                                <li><a href="#" id="deletePublisher">Delete</a></li>
                                                {{-- <li class="divider"></li> --}}
                                                {{-- <li><a href="#">Separated link</a></li> --}}
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
                {{ $publishers->links() }}
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add A New Client</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route('addNewPublisher') }}" role="form" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="publisher_name" placeholder="Full Name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="publisher_email" placeholder="Email Address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="publisher_password" placeholder="Password" class="form-control">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Client</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <script>
        $('#users, #publishers').addClass('active');

        $('a#deletePublisher').on('click', function(e) {
            var response = confirm('Do you really want to delete this user?');
            if (response === true) {
                return true;
            } else {
                return false;
            }
        });
    </script>

@stop
