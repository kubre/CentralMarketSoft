@extends('layouts.app')

@section('styles')
    <style>
        body {
            background: url('/images/bg.jpg');
        }

        .mynav, .panel {
            background: rgba(0, 0, 0, 0.8);
            color: #dfdfdf;
        }

        .panel input {
            color: #dfdfdf;
        }

        .panel .btn-link {
            border: 1px solid #fff;
            color: #fff;
        }

        .panel .btn-link:hover {
            color: #111;
        }
    </style>
@endsection

@section('content')
<div class="container">
    @include('layouts.messages')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Demo Login Accounts</div>
                <div class="panel-body">
                    <table class="table table-stripped w-100">
                        <tbody>
                            <tr>
                                <th class="text-center" colspan="2">Admin</th>
                            </tr>
                            <tr>
                                <td>9090909090</td>
                                <td>123456</td>
                            </tr>
                            <tr>
                                <th class="text-center" colspan="2">User</th>
                            </tr>
                            <tr>
                                <td>9123456789</td>
                                <td>123456</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">{{__('forms.login')}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{__('forms.mobile')}}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control" name="mobile" maxlength="10"
                                    minlength="10" value="{{ old('mobile') }}" required autofocus>

                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{__('forms.remember')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('forms.login')}}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{__('forms.forgotpassword')}}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection