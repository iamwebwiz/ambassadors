@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-sm-12">
            <h2>Add A New Company</h2>
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <form action="{{ route('addNewCompany') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" placeholder="Company Name" class="form-control"
                                    value="{{ old('company_name') }}" style="border:1px solid gray;background:gray;color:#fff">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="address" name="company_address" placeholder="Company Address" class="form-control"
                                    value="{{ old('company_address') }}" style="border:1px solid gray;background:gray;color:#fff">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success btn-fill" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#companies').addClass('active');
    </script>

@endsection
