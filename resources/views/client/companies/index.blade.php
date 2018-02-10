@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-sm-12">
            <h1>My Companies</h1>
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('newCompany') }}" class="pull-right btn btn-primary">
                                New Company
                            </a>
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

@endsection

@section('script')
<script>
    $('#companies').addClass('active');
</script>
@endsection
