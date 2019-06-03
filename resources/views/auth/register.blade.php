@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('forms.register')}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{__('forms.propname')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">{{__('forms.mobile')}}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" maxlength="10" minlength="10"
                                    name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">{{__('forms.dob')}}</label>

                            <div class="col-md-6">
                                <input id="dob" class="datepick form-control" type="text" class="form-control"
                                    name="dob" value="{{ old('dob') }}" required>

                                @if ($errors->has('dob'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{__('forms.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"
                                class="col-md-4 control-label">{{__('forms.confpassword')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <hr>
                        <h4>{{__('forms.shopdetails')}}</h4>

                        <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
                            <label for="shop_name" class="col-md-4 control-label">{{__('forms.shopname')}}</label>

                            <div class="col-md-6">
                                <input id="shop_name" type="text" class="form-control" name="shop_name"
                                    value="{{ old('shop_name') }}" required>

                                @if ($errors->has('shop_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('shop_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_do') ? ' has-error' : '' }}">
                            <label for="shop_do" class="col-md-4 control-label">{{__('forms.shopdo')}}</label>

                            <div class="col-md-6">
                                <input id="shop_do" class="datepick form-control" type="text" class="form-control"
                                    name="shop_do" value="{{ old('shop_do') }}" required>

                                @if ($errors->has('shop_do'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('shop_do') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('seed_lic') ? ' has-error' : '' }}">
                            <label for="seed_lic" class="col-md-4 control-label">{{__('forms.seedlic')}}</label>

                            <div class="col-md-6">
                                <input id="seed_lic" type="text" class="form-control" name="seed_lic"
                                    value="{{ old('seed_lic') }}">

                                @if ($errors->has('seed_lic'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seed_lic') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('seed_exp') ? ' has-error' : '' }}">
                            <label for="seed_exp" class="col-md-4 control-label">{{__('forms.seedexp')}}</label>

                            <div class="col-md-6">
                                <input id="seed_exp" type="text" class="datepick form-control" name="seed_exp"
                                    value="{{ old('seed_exp') }}">

                                @if ($errors->has('seed_exp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seed_exp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('fert_lic') ? ' has-error' : '' }}">
                            <label for="fert_lic" class="col-md-4 control-label">{{__('forms.fertlic')}}</label>

                            <div class="col-md-6">
                                <input id="fert_lic" type="text" class="form-control" name="fert_lic"
                                    value="{{ old('fert_lic') }}">

                                @if ($errors->has('fert_lic'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fert_lic') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fert_exp') ? ' has-error' : '' }}">
                            <label for="fert_exp" class="col-md-4 control-label">{{__('forms.fertexp')}}</label>

                            <div class="col-md-6">
                                <input id="fert_exp" type="text" class="datepick form-control" name="fert_exp"
                                    value="{{ old('fert_exp') }}">

                                @if ($errors->has('fert_exp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fert_exp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pest_lic') ? ' has-error' : '' }}">
                            <label for="pest_lic" class="col-md-4 control-label">{{__('forms.pestlic')}}</label>

                            <div class="col-md-6">
                                <input id="pest_lic" type="text" class="form-control" name="pest_lic"
                                    value="{{ old('pest_lic') }}">

                                @if ($errors->has('pest_lic'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pest_lic') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pest_exp') ? ' has-error' : '' }}">
                            <label for="pest_exp" class="col-md-4 control-label">{{__('forms.pestexp')}}</label>

                            <div class="col-md-6">
                                <input id="pest_exp" type="text" class="datepick form-control" name="pest_exp"
                                    value="{{ old('pest_exp') }}">

                                @if ($errors->has('fert_exp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pest_exp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_act') ? ' has-error' : '' }}">
                            <label for="shop_act" class="col-md-4 control-label">{{__('forms.shoplic')}}</label>

                            <div class="col-md-6">
                                <input id="shop_act" type="text" class="form-control" name="shop_act"
                                    value="{{ old('shop_act') }}">

                                @if ($errors->has('shop_act'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('shop_act') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_exp') ? ' has-error' : '' }}">
                            <label for="shop_exp" class="col-md-4 control-label">{{__('forms.shopexp')}}</label>

                            <div class="col-md-6">
                                <input id="shop_exp" type="text" class="datepick form-control" name="shop_exp"
                                    value="{{ old('shop_exp') }}">

                                @if ($errors->has('shop_exp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('shop_exp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('shop_contact') ? ' has-error' : '' }}">
                            <label for="shop_contact" class="col-md-4 control-label">{{__('forms.shopcontact')}}</label>

                            <div class="col-md-6">
                                <input id="shop_contact" type="text" class="form-control" maxlength="10" minlength="10"
                                    name="shop_contact" value="{{ old('shop_contact') }}">

                                @if ($errors->has('shop_contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('shop_contact') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                            <label for="gst" class="col-md-4 control-label">{{__('forms.gst')}}</label>

                            <div class="col-md-6">
                                <input id="gst" type="text" class="form-control" name="gst" value="{{ old('gst') }}">

                                @if ($errors->has('gst'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gst') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                            <label for="pan" class="col-md-4 control-label">{{__('forms.panno')}}</label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control" name="pan" maxlength="10"
                                    minlength="10" value="{{ old('pan') }}">

                                @if ($errors->has('pan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aadhar') ? ' has-error' : '' }}">
                            <label for="aadhar" class="col-md-4 control-label">{{__('forms.aadharno')}}</label>

                            <div class="col-md-6">
                                <input id="aadhar" type="text" class="form-control" name="aadhar" minlength="12"
                                    maxlength="12" value="{{ old('aadhar') }}">

                                @if ($errors->has('aadhar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('aadhar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <h4>{{__('forms.address')}}</h4>

                        <div class="form-group{{ $errors->has('block_no') ? ' has-error' : '' }}">
                            <label for="block_no" class="col-md-4 control-label">{{__('forms.shopadd')}}</label>

                            <div class="col-md-6">
                                <input id="block_no" type="text" class="form-control" name="block_no"
                                    value="{{ old('block_no') }}">

                                @if ($errors->has('block_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('block_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                            <label for="village" class="col-md-4 control-label">{{__('forms.village')}}</label>

                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control" name="village"
                                    value="{{ old('village') }}">

                                @if ($errors->has('village'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('village') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('taluka') ? ' has-error' : '' }}">
                            <label for="taluka" class="col-md-4 control-label">{{__('forms.taluka')}}</label>

                            <div class="col-md-6">
                                <input id="taluka" type="text" class="form-control" name="taluka"
                                    value="{{ old('taluka') }}">

                                @if ($errors->has('taluka'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('taluka') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('taluka') ? ' has-error' : '' }}">
                            <label for="taluka" class="col-md-4 control-label">{{__('forms.taluka')}}</label>

                            <div class="col-md-6">
                                <input id="taluka" type="text" class="form-control" name="taluka" value="{{ old('taluka') }}">

                                @if ($errors->has('taluka'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('taluka') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">{{__('forms.city')}}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                            <label for="district" class="col-md-4 control-label">{{__('forms.district')}}</label>

                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control" name="district"
                                    value="{{ old('district') }}">

                                @if ($errors->has('district'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('district') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{__('forms.register')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection