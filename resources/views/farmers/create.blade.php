@extends('layouts.user')

@section('content')

<div class="container panel panel-default">
    <div class="panel-heading">
        <h4>Register Farmer to Central a Database</h4>
    </div>
    <div class="panel-body">
        
        @include('layouts.messages')

        <form class="form-horizontal" action="/farmer" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-md-4 control-label">First Name</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                        required autofocus>

                    @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                        required>

                    @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="col-md-4 control-label">Mobile No.</label>

                <div class="col-md-6">
                    <input id="mobile" type="text" class="form-control" maxlength="10" maxlength="10" name="mobile"
                        value="{{ old('mobile') }}" required>

                    @if ($errors->has('mobile'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                <label for="dob" class="col-md-4 control-label">dob</label>

                <div class="col-md-6">
                    <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

                    @if ($errors->has('dob'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('aadhar') ? ' has-error' : '' }}">
                <label for="aadhar" class="col-md-4 control-label">Aadhar No.</label>

                <div class="col-md-6">
                    <input id="aadhar" type="text" class="form-control" maxlength="12" minlength="12" name="aadhar"
                        value="{{ old('aadhar') }}" required>

                    @if ($errors->has('aadhar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('aadhar') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                <label for="pan" class="col-md-4 control-label">PAN</label>

                <div class="col-md-6">
                    <input id="pan" type="text" class="form-control" maxlength="10" minlength="10" name="pan" value="{{ old('pan') }}"
                        required>

                    @if ($errors->has('pan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pan') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('light_bill') ? ' has-error' : '' }}">
                <label for="light_bill" class="col-md-4 control-label">Light Bill</label>

                <div class="col-md-6">
                    <input id="light_bill" type="text" class="form-control" name="light_bill" value="{{ old('light_bill') }}"
                        required>

                    @if ($errors->has('light_bill'))
                    <span class="help-block">
                        <strong>{{ $errors->first('light_bill') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <!-- Address Section -->
            <div class="form-group{{ $errors->has('block_no') ? ' has-error' : '' }}">
                <label for="block_no" class="col-md-4 control-label">shop_no</label>

                <div class="col-md-6">
                    <input id="block_no" type="text" class="form-control" name="block_no" value="{{ old('block_no') }}">

                    @if ($errors->has('block_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('block_no') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                <label for="village" class="col-md-4 control-label">village</label>

                <div class="col-md-6">
                    <input id="village" type="text" class="form-control" name="village" value="{{ old('village') }}">

                    @if ($errors->has('village'))
                    <span class="help-block">
                        <strong>{{ $errors->first('village') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="city" class="col-md-4 control-label">city</label>

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
                <label for="district" class="col-md-4 control-label">district</label>

                <div class="col-md-6">
                    <input id="district" type="text" class="form-control" name="district" value="{{ old('district') }}">

                    @if ($errors->has('district'))
                    <span class="help-block">
                        <strong>{{ $errors->first('district') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <hr>

            <div class="row">
                <button type="submit" class="btn btn-success col-md-6 col-md-offset-4">Register</button>
            </div>

        </form>
    </div>
</div>

@endsection