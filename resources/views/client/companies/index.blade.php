@extends('layouts.client')

@section('body')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bordered panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <a href="{{ route('newCompany') }}" class="pull-right btn btn-primary">
                                New Company
                            </a> --}}
                            <button class="btn btn-primary pull-right waves-effect waves-light" data-target="#exampleNifty3dSlit" data-toggle="modal" type="button">New Company</button>
                        </div>
                    </div>
                    <br><br>
                    @if ($user->companies->count() > 0)
                        <div class="table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Adverts</th>
                                    <th>Date Added</th>
                                </thead>
                                <tbody>
                                    @foreach ($user->companies as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>{{ $company->advertRequests->count() }}</td>
                                            <td>{{ $company->created_at->format('jS F Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-center">No Companies Added Just Yet!</h3>
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
                    <h4 class="modal-title">Add A New Company</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('addNewCompany') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" placeholder="Company Name" class="form-control"
                            value="{{ old('company_name') }}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="address" name="company_address" placeholder="Company Address" class="form-control"
                            value="{{ old('company_address') }}">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-pure margin-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection

@section('scripts')
<script>
    $('#companies').addClass('active');
</script>
@endsection
