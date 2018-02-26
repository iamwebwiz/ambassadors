@extends('layouts.publisher')

@section('body')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $title }}</h3>
            </div>
            <div class="panel-body">
                @if (count($referrals) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Registration Date</th>
                            </thead>
                            <tbody>
                                @foreach ($referrals as $referral)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $referral->username }}</td>
                                        <td>{{ $referral->created_at->format('jS F Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h3 class="text-info text-center">
                        You have not referred any publisher. Share your referral link to get referrals.
                    </h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function(){
        $('li#referrals').addClass('active');
    });
</script>
@endsection
