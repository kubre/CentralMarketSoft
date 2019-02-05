@extends('layouts.user')

@section('styles')
    <style>
        .details ul {
            list-style-type: none;
        }
        .details li {
            margin-top: 10px;
        }

        .mono {
            font-family: monospace;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
<div class="container panel panel-default">
    {{-- <div class="panel-heading">
        <h3>Debt. from <strong>{{ $debt->user->shop->shop_name }}</strong>
        to <strong>{{ $debt->farmer->first_name }} {{ $debt->farmer->last_name }}</strong></h3>
    </div> --}}
    <div class="panel-heading row">
        <h4 class="col-md-3">Debt. Details</h4>
        @if(Auth::user()->id === $debt->user->id)
            <span class="col-md-3 col-md-offset-6">
                <a class='btn btn-primary btn-block' style="margin-top: 5px" href='/debit/{{$debt->id}}/edit'>Update</a>
            </span>
        @endif
    </div>
    <div class="panel-body details">

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-5">
                <strong>Total Amount:</strong> <span class="mono"> lol implement Transactions FIRST XD</span>
            </div>
            
            <div class="col-md-4">
                <strong>Amount Remaining</strong>: <span class="mono"> {{ $debt->amount }}
            </div>

            <div class="col-md-3">
                <strong>Date:</strong> <span class="mono">{{ date('(D)j-M-Y', strtotime($debt->created_at)) }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"><strong>Comment:</strong></div>
            <div class="col-md-10 mono" style="padding-left: 20px;">{{ $debt->comment ?: "No Comment!" }}</div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4>Shop Details: </h4>
                <hr>
                <ul>
                    <li class="row">
                        <strong class="col-md-3">Shop:</strong>
                        <div class="col-md-9">{{ $debt->user->shop->shop_name }}</div>
                    </li>

                    <li class="row">
                        <strong class="col-md-3">Owner:</strong>
                        <div class="col-md-9"> {{ $debt->user->name }} </div>
                    </li>
                    <li class="row">
                        <strong class="col-md-3">Address:</strong>
                        <div class="col-md-9">
                            Shop No.{{ $debt->user->shop->address->block_no }},<br>
                            {{ $debt->user->shop->address->village }},
                            {{ $debt->user->shop->address->city }},<br>
                            Dist. {{ $debt->user->shop->address->district }}
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Farmer's Details</h4>
                <hr>
                <ul>
                    <li class="row">
                        <strong class="col-md-3">Name:</strong>
                        <div class="col-md-9">{{ $debt->farmer->first_name }} {{ $debt->farmer->last_name }}</div>
                    </li>
                    <li class="row">
                        <strong class="col-md-3">Aadhar:</strong>
                        <div class="col-md-9">{{ $debt->farmer->aadhar }}</div>
                    </li>
                    <li class="row">
                        <strong class="col-md-3">PAN:</strong>
                        <div class="col-md-9">{{ $debt->farmer->pan }}</div>
                    </li>
                    <li class="row">
                        <strong class="col-md-3">Address:</strong>
                        <div class="col-md-9">
                            House No.{{ $debt->farmer->address->block_no }},<br>
                            {{ $debt->farmer->address->village }},
                            {{ $debt->farmer->address->city }},<br>
                            Dist. {{ $debt->farmer->address->district }}
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <h4>Transaction Details</h4>
        <div class="row">
        </div>
    </div>
</div>
@endsection