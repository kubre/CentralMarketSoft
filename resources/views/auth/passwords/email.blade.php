@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('forms.resetpassword')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('reset.verify') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">{{__('forms.regdmobile')}}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aadhar') ? ' has-error' : '' }}">
                            <label for="aadhar" class="col-md-4 control-label">{{__('forms.aadharno')}}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="aadhar" value="{{ old('aadhar') }}" required>

                                @if ($errors->has('aadhar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aadhar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                            <label for="pan" class="col-md-4 control-label">{{__('forms.panno')}}</label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control" name="pan" value="{{ old('pan') }}" required>

                                @if ($errors->has('pan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('forms.sendpasswordlink')}}
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
