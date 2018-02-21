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
                            {{-- <a href="{{ route('client.newPublication') }}" class="pull-right btn btn-primary">
                                New Advert Request
                            </a> --}}
                            <button class="btn btn-primary pull-right waves-effect waves-light" data-target="#exampleNifty3dSlit"
                            data-toggle="modal" type="button">
                                New Publication Request
                            </button>
                        </div>
                    </div>
                    <br><br>
                    @if ($user->advertRequests->count() > 0)
                        <div class="table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Company</th>
                                    <th>Date Added</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($user->advertRequests as $advert)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $advert->title }}</td>
                                            <td>{{ str_limit($advert->body, $limit = 30, $end = '...') }}</td>
                                            <td>{{ $advert->company->name }}</td>
                                            <td>{{ $advert->created_at->format('jS F Y') }}</td>
                                            <td>
                                                <?php
                                                    switch ($advert->status) {
                                                        case 'Pending':
                                                            echo "<div class='label label-default'>Pending</div>";
                                                            break;
                                                        case 'Matched':
                                                            echo "<div class='label label-warning'>Matched</div>";
                                                            break;
                                                        case 'Processing':
                                                            echo "<div class='label label-info'>Processing</div>";
                                                            break;
                                                        case 'Finished':
                                                            echo "<div class='label label-success'>Finished</div>";
                                                            break;
                                                        default:
                                                            echo "";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-center">No Publications Added Just Yet!</h3>
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
                    <h4 class="modal-title">Add A New Publication</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('requestNewPublication') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Advert Title</label>
                            <input type="text" name="title" placeholder="Title" class="form-control" required
                           >
                        </div>

                        <div class="form-group">
                            <label>Company</label>
                            <select name="company" class="form-control">
                                <option value="">Choose Company</option>
                                @foreach (auth()->user()->companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Advert Body</label>
                            <textarea rows="5" name="description" placeholder="Compose your advert message here"
                            class="form-control"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pure margin-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Request Publication</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection

@section('scripts')
<script>
    $('#publications').addClass('active');
</script>
@endsection
