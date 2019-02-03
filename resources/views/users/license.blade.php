@extends('layouts.user')

@section('content')

    <div class="container">
        @include('layouts.messages')
    </div>

    @isset($shop->seed_lic)        
        <div class="container panel panel-default">
            <div class="panel-heading">
                <h4>Seed License</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    Expires on <strong>{{ date("D/j-M-Y", strtotime($shop->seed_exp)) }}</strong>.
                </div>
                <form action="/license/seed" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-8 row input-group">
                        <label class="col-md-5" for="seed_exp">Update Seed License Expiry Date:</label>
                        <input class="col-md-4" style="padding: 5px 6px" type="date" name="seed_exp" id="seed_exp" value="{{ $shop->seed_exp }}" required>
                        <button class="col-md-2 col-md-offset-1 btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endisset

    @isset($shop->fert_exp)        
        <div class="container panel panel-default">
            <div class="panel-heading">
                <h4>Fertilizer License</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    Expires on <strong>{{ date("D/j-M-Y", strtotime($shop->fert_exp)) }}</strong>.
                </div>
                <form action="/license/fert" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-8 row input-group">
                        <label class="col-md-5" for="fert_exp">Update Fertilizer License Expiry Date:</label>
                        <input class="col-md-4" style="padding: 6px 6px" type="date" name="fert_exp" id="fert_exp" value="{{ $shop->fert_exp }}" required>
                        <button class="btn btn-success col-md-offset-1 col-md-2" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endisset

    @isset($shop->pest_exp)        
        <div class="container panel panel-default">
            <div class="panel-heading">
                <h4>Pesticide License</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    Expires on <strong>{{ date("D/j-M-Y", strtotime($shop->pest_exp)) }}</strong>.
                </div>
                <form action="/license/pest" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-8 row input-group">
                        <label class="col-md-5" for="pest_exp">Update Pesticide License Expiry Date:</label>
                        <input class="col-md-4" style="padding: 5px 6px" type="date" name="pest_exp" id="pest_exp" value="{{ $shop->pest_exp }}" required>
                        <button class="col-md-2 col-md-offset-1 btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endisset

    @isset($shop->shop_act)        
        <div class="container panel panel-default">
            <div class="panel-heading">
                <h4>Shop Act</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    Expires on <strong>{{ date("D/j-M-Y", strtotime($shop->shop_exp)) }}</strong>.
                </div>
                <form action="/license/shop" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-8 row input-group">
                        <label class="col-md-5" for="shop_exp">Update Shop Act Expiry Date:</label>
                        <input class="col-md-4" style="padding: 5px 6px" type="date" name="shop_exp" id="shop_exp" value="{{ $shop->shop_exp }}" required>
                        <button class="col-md-2 col-md-offset-1 btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endisset
@endsection