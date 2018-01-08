@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-sm-12">
            <h2>New Publication Request</h2>
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <form action="{{ route('requestNewPublication') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Advert Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" required
                                    style="border:1px solid gray">
                                </div>

                                <div class="form-group">
                                    <label>Company</label>
                                    <select name="company" class="form-control" style="border:1px solid gray">
                                        <option value="">Choose Company</option>
                                        @foreach (auth()->user()->companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Advert Body</label>
                                    <textarea rows="5" name="description" placeholder="Compose your advert message here"
                                    class="form-control" style="border:1px solid gray"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-fill" type="submit">
                                        Request Publication
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
        $('#publications').addClass('active');
    </script>

@endsection
