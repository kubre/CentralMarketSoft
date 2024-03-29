@extends('layouts.user')

@section('content')

<div class="container">
    @include('layouts.messages')

    @isset($shop->seed_lic)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4> {{ __('user.seedlic') }} </h4>
        </div>
        <div class="panel-body">
            <div class="col-md-4" style="margin-bottom: 10px">
                {{ __('user.expiry') }}: <strong>{{ date("j/m/Y", strtotime($shop->seed_exp)) }}</strong>.
            </div>
            <form action="/license/seed" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-8 row input-group">
                    <label class="col-md-5 col-xs-12" for="seed_exp">{{ __('user.expiry') }} {{ __('user.update') }}
                        :</label>
                    <input class="col-md-4 col-xs-12 datepick" style="padding: 5px 6px;margin: 10px auto" type="text"
                        name="seed_exp" id="seed_exp" value="{{ $shop->seed_exp }}" required>
                    <button class="col-md-2 col-xs-12 col-md-offset-1 btn btn-success"
                        type="submit">{{ __('user.save') }}</button>
                </div>
            </form>
        </div>
    </div>
    @endisset

    @isset($shop->fert_exp)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4> {{ __('user.fertlic') }} </h4>
        </div>
        <div class="panel-body">
            <div class="col-sm-4" style="margin-bottom: 10px">
                {{ __('user.expiry') }}: <strong>{{ date("j/M/Y", strtotime($shop->fert_exp)) }}</strong>.
            </div>
            <form action="/license/fert" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-sm-8 row input-group">
                    <label class="col-md-5 col-xs-12" for="fert_exp">{{ __('user.expiry') }} {{ __('user.update') }}
                        :</label>
                    <input class="col-md-4 col-xs-12 datepick" style="padding: 6px 6px;margin: 10px auto" type="text"
                        name="fert_exp" id="fert_exp" value="{{ $shop->fert_exp }}" required>
                    <button class="btn btn-success col-md-offset-1 col-md-2 col-xs-12"
                        type="submit">{{ __('user.save') }}</button>
                </div>
            </form>
        </div>
    </div>
    @endisset

    @isset($shop->pest_exp)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4> {{ __('user.pestlic') }} </h4>
        </div>
        <div class="panel-body">
            <div class="col-md-4" style="margin-bottom: 10px">
                {{ __('user.expiry') }}: <strong>{{ date("j/M/Y", strtotime($shop->pest_exp)) }}</strong>.
            </div>
            <form action="/license/pest" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-8 row input-group">
                    <label class="col-md-5 col-xs-12" for="pest_exp">{{ __('user.expiry') }} {{ __('user.update') }}
                        :</label>
                    <input class="col-md-4 col-xs-12 datepick" style="padding: 5px 6px;margin: 10px auto" type="text"
                        name="pest_exp" id="pest_exp" value="{{ $shop->pest_exp }}" required>
                    <button class="col-md-2 col-xs-12 col-md-offset-1 btn btn-success"
                        type="submit">{{ __('user.save') }}</button>
                </div>
            </form>
        </div>
    </div>
    @endisset

    @isset($shop->shop_act)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4> {{ __('user.shopact') }} </h4>
        </div>
        <div class="panel-body">
            <div class="col-md-4" style="margin-bottom: 10px">
                {{ __('user.expiry') }}: <strong>{{ date("j/M/Y", strtotime($shop->shop_exp)) }}</strong>.
            </div>
            <form action="/license/shop" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-8 row input-group">
                    <label class="col-md-5 col-xs-12" for="shop_exp">{{ __('user.expiry') }} {{ __('user.update') }}
                        :</label>
                    <input class="col-md-4 col-xs-12 datepick" style="padding: 5px 6px;margin: 10px auto" type="text"
                        name="shop_exp" id="shop_exp" value="{{ $shop->shop_exp }}" required>
                    <button class="col-md-2 col-xs-12 col-md-offset-1 btn btn-success"
                        type="submit">{{ __('user.save') }}</button>
                </div>
            </form>
        </div>
    </div>
    @endisset
</div>
@endsection