@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('user.myshop') }}</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form id="debt-search-form" class="form-horizontal" action="javascript:void(0)" method="post">
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">{{ __('forms.firstname') }}</label>
                                <input class="col-md-8 search" type="text" id="first_name" name="first_name">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4"> {{ __('forms.lastname') }} </label>
                                <input class="col-md-8 search" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4"> {{ __('forms.mobile') }} </label>
                                <input class="col-md-8 search" type="text" name="mobile" id="mobile">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4"> {{ __('forms.village') }} </label>
                                <input class="col-md-8 search" type="text" name="village" id="village">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4"> {{ __('forms.aadharno') }} </label>
                                <input class="col-md-8 search" type="text" name="aadhar" id="aadhar">
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-md-4" for=""> {{ __('forms.panno') }} </label>
                                <input class="col-md-8 search" type="text" name="pan" id="pan">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="">
                        <strong> {{ __('user.searchresults') }} </strong>
                        <table class="table" id="debt-table">
                            <thead>
                                <tr>
                                    <th> {{ __('user.fullname') }} </th>
                                    <th> {{ __('forms.aadharno') }}/{{ __('forms.panno') }} </th>
                                    <th> {{ __('user.shop') }} </th>
                                    <th> {{ __('user.remainingamount') }} </th>
                                    <th> {{ __('user.amountissued') }} </th>
                                    <th> {{ __('user.details') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">{{ __('user.type') }}...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            
            function fetchDebts(data) {
                $.post("/myshop/debt/search", data , function(res) {
                    $("#debt-table tbody").html(res.tbody);
                });
            }

            $("#debt-search-form").on("keyup", "input.search",function() {
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "first_name": $("#first_name").val(),
                    "last_name": $("#last_name").val(),
                    "mobile": $("#mobile").val(),
                    "village": $("#village").val(),
                    "aadhar": $("#aadhar").val(),
                    "pan": $("#pan").val()
                };
                fetchDebts(data);
            });

        });
    </script>
@endsection

{{--@extends('layouts.user')

@section('content')
<div class="container panel">
    <div class="panel-heading">My Shop</div>
    <div class="panel-body">

        <div class="row">
        <!-- Search Box -->
        <form class="form-horizontal col-md-6" action="/myshop/debt/search" method="post">
            {{ @csrf_field() }}
            <div class="input-group">
                <input class="form-control" name="name" id="name" type="text" 
                maxlength="10" value="{{ isset($name) ? $name : '' }}" 
                placeholder="Search by Name">

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                </span>
            </div>
        </form>
        </div>
        <hr>
        <p>
            <!-- No of users found -->
            @isset($found)
                {{ $debts->count() }} Farmers with
                with name like <strong>{{ $name }}</strong>.
            @endisset
        </p>

        <!-- Go over users and display them -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Aadhar/PAN</th>
                    <th>Mobile</th>
                    <th>Remaining Amount</th>
                    <th>Issued Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($debts->all() as $debt)
                <tr>
                    <td> {{ $debt->farmer->first_name }} {{ $debt->farmer->last_name }} </td>
                    <td> {{ $debt->farmer->pan }} {{ $debt->farmer->pan }} </td>
                    <td> {{ $debt->farmer->mobile }} </td>
                    <td> {{ $debt->amount == 0 ? 'Nill' : $debt->amount }} </td>
                    <td> {{ $debt->transactions->first()->amount }} </td>
                    <td>
                        <a href="/debit/{{$debt->id}}" class="btn btn-info">View</a>
                    </td>
                @empty
                    @isset($found)
                    <td colpsan="4">
                        No users found with mobile no. {{ $mobile }}
                    </td>
                    @else
                    <td colpsan="4">
                        No users are registered
                    </td>
                    @endisset
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $debts->links() }}
    </div>
</div>
@endsection --}}