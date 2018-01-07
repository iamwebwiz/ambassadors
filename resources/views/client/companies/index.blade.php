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
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Shitty Company</td>
                                    <td>34, Ede Street, Nigeria</td>
                                    <td>24/07/2019</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#companies').addClass('active');
    </script>

@endsection
