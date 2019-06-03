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
        font-family: 'lucida console', ubuntu mono, monospace !important;
        margin-left: 10px;
    }

    .table th {
        text-align: center;
    }

    .table tbody td:first-child {
        max-width: 150px;
        padding: 10px;
    }

    .table tbody td:nth-child(2) {
        min-width: 200px;
        text-align: right;
        padding-right: 35px;
    }

    .table tbody td:nth-child(3) {
        min-width: 100px;
        text-align: center;
        padding-right: 35px;
    }
</style>
@endsection

@section('content')
<div class="container">

    <div class="panel panel-default" style="margin-bottom: 80px;">
        <div class="panel-heading">
            {{ __('user.debtdetails') }}
            @if(Auth::user()->id === $debt->user->id)
            <span class="pull-right" style="position: relative; top -60px; margin-top: -3px;">
                <a class='btn btn-primary btn-block' href='/debit/{{$debt->id}}/edit'>
                    {{ __('user.update') }} </a>
            </span>
            @endif
        </div>
        <div class="panel-body details">

            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-5">
                    <strong>{{ __('user.amountissued') }}</strong>: <span class="mono">
                        {{ number_format($debt->transactions->first()->amount) }} {{ __('user.inr') }}</span>
                </div>

                <div class="col-md-4">
                    <strong>{{ __('user.remainingamount') }}</strong>:
                    <span class="mono">
                        {{ $debt->amount == 0 ? __('user.nill') : number_format($debt->amount) . __('user.inr')  }}
                    </span>
                </div>

                <div class="col-md-3">
                    <strong> {{ __('user.date') }} :</strong> <span
                        class="mono">{{ date('Y', strtotime($debt->created_at)) }}</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"><strong> {{ __('user.comment') }} :</strong></div>
                <div class="col-md-10 mono" style="margin-left: -18px;">{{ $debt->comment ?: "--" }}</div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h4>{{ __('user.shop') }}: </h4>
                    <hr>
                    <ul>
                        <li class="row">
                            <strong class="col-md-3"> {{ __('user.shopname') }}:</strong>
                            <div class="col-md-9">{{ $debt->user->shop->shop_name }}</div>
                        </li>

                        <li class="row">
                            <strong class="col-md-3"> {{ __('user.owner') }}:</strong>
                            <div class="col-md-9"> {{ $debt->user->name }} </div>
                        </li>
                        <li class="row">
                            <strong class="col-md-3"> {{ __('user.address') }}:</strong>
                            <div class="col-md-9">
                                {{ __('user.shopno') }} {{ $debt->user->shop->address->block_no }},<br>
                                {{ $debt->user->shop->address->village }},
                                {{ $debt->user->shop->address->city }},<br>
                                {{ __('forms.district') }}, {{ $debt->user->shop->address->district }}
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4> {{ __('user.farmersdetails') }}</h4>
                    <hr>
                    <ul>
                        <li class="row">
                            <strong class="col-md-3">{{ __('user.fullname') }}:</strong>
                            <div class="col-md-9">{{ $debt->farmer->first_name }} {{ $debt->farmer->last_name }}</div>
                        </li>
                        <li class="row">
                            <strong class="col-md-3">{{ __('forms.aadharno') }}:</strong>
                            <div class="col-md-9">{{ $debt->farmer->aadhar }}</div>
                        </li>
                        <li class="row">
                            <strong class="col-md-3">{{ __('user.address') }}:</strong>
                            <div class="col-md-9">
                                {{ $debt->farmer->address->village }},
                                {{ $debt->farmer->address->taluka }},<br>
                                {{ __('forms.district') }}, {{ $debt->farmer->address->district }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <h4> {{ __('user.transaction') }} {{ __('user.details') }}</h4>
            <div style="max-width: 960px; margin: 0 auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th> {{ __('user.date') }} </th>
                            <th> {{ __('user.amount') }} </th>
                            <th> {{ __('user.details') }} </th>
                        </tr>
                    </thead>
                    <tbody style="font-family: monospace">
                        @php
                        $lastAmount = 0;
                        @endphp
                        @foreach ($debt->transactions->all() as $transaction)
                        <tr>
                            <td> {{ date('Y', strtotime($transaction->created_at)) }} </td>
                            <td class="mono">
                                {{ $loop->first 
                                ? number_format($transaction->amount)
                                : number_format($transaction->amount - $lastAmount)
                            }}
                            </td>
                            <td>
                                @if(Auth::user()->id === $debt->user->id)
                                <a href="/transaction/show/{{ $transaction->id }}/{{ $transaction->amount - $lastAmount }}"
                                    class="btn btn-info">{{ __('user.details') }}</a>
                                @endif
                            </td>
                        </tr>
                        @php
                        $lastAmount = $transaction->amount;
                        @endphp
                        @endforeach
                        <tr>
                            <td>{{ __('user.remainingamount')  }}: </td>
                            <td class="mono"> {{ $debt->amount == 0 ? __('user.nill') : number_format($debt->amount) }}
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection