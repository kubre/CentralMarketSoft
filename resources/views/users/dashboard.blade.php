@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Your Shop <strong>{{ Auth::user()->shop->shop_name }}</strong> and your address is <strong>{{ Auth::user()->shop->address->village }},
                    {{ Auth::user()->shop->address->city }}, {{ Auth::user()->shop->address->district }}</strong>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
