@extends('layouts.user')

@section('content')

<div class="container">

    @include('layouts.messages')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ __('user.farmersdetails')." ".__('user.update') }}
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="/farmer/{{$customer->id}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name" class="col-md-4 control-label"> {{ __('forms.fullname') }} </label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control" name="first_name"
                            value="{{ $customer->first_name }}" required autofocus>

                        @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label for="mobile" class="col-md-4 control-label"> {{ __('forms.mobile') }} </label>

                    <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control" maxlength="10" maxlength="10" name="mobile"
                            value="{{ $customer->mobile }}">

                        @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('aadhar') ? ' has-error' : '' }}">
                    <label for="aadhar" class="col-md-4 control-label"> {{ __('forms.aadharno') }} </label>

                    <div class="col-md-6">
                        <input id="aadhar" type="text" class="form-control" maxlength="12" minlength="12" name="aadhar"
                            value="{{ $customer->aadhar }}">

                        @if ($errors->has('aadhar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('aadhar') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                    <label for="village" class="col-md-4 control-label"> {{ __('forms.village') }} </label>

                    <div class="col-md-6">
                        <input id="village" type="text" class="form-control" name="village"
                            value="{{ $customer->address->village }}">

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
                            value="{{ $customer->address->taluka }}">

                        @if ($errors->has('taluka'))
                        <span class="help-block">
                            <strong>{{ $errors->first('taluka') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                    <label for="district" class="col-md-4 control-label"> {{ __('forms.district') }} </label>

                    <div class="col-md-6">
                        <input id="district" type="text" class="form-control" name="district"
                            value="{{ $customer->address->district }}">

                        @if ($errors->has('district'))
                        <span class="help-block">
                            <strong>{{ $errors->first('district') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <hr>

                <div class="row">
                    <button type="submit" class="btn btn-success col-md-6 col-md-offset-4"> {{ __('user.update') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection