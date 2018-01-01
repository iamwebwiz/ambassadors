@extends('layouts.users')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h1>My Publications</h1>
            <div class="card">
                <div class="content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Client</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Advert for CowryWise</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                    <td>CowryWise</td>
                                    <td>January 1st, 2018</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#publications').addClass('active');
    </script>

@endsection
