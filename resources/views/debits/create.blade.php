@extends('layouts.user')

@section('content')

<div class="container panel panel-default">

    @include('layouts.messages')

    <div class="panel-heading">
        <h4> {{ __('user.issuedebt') }} -> {{ $farmer->first_name }} {{ $farmer->last_name }} </h4>
    </div>
    <div class="panel-body">

        <form class="form-horizontal" action="/debit" method="post">
            {{ csrf_field() }}

            <input id="farmer_id" type="hidden" class="form-control" name="farmer_id" value="{{ $farmer->id }}" required>

            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="amount" class="col-md-4 control-label"> {{ __('user.amount') }} </label>

                <div class="col-md-6">
                    <input id="amount" style="font-family: monospace;" type="text" class="form-control" name="amount" value="{{ old('amount') }}"
                        required>

                    @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="shop_exp" class="col-md-4 control-label">{{__('user.date')}}</label>

                <div class="col-md-6">
                    <input id="date" type="text" class="datepick form-control" name="date" value="{{ old('date') }}">

                    @if ($errors->has('date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                <label for="comment" class="col-md-4 control-label"> {{ __('user.comment') }} </label>

                <div class="col-md-6">
                    <input id="comment" type="text" class="form-control" name="comment" maxlength="255" value="{{ old('comment') }}">

                    @if ($errors->has('comment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <span class="help-block text-center"> {{ __('user.comment') }} {{ __('user.isoptional') }}. </span>

            <hr>

            <div class="row">
                <button type="submit" class="btn btn-success col-xs-12 col-md-6 col-md-offset-4"> {{ __('user.issue') }} </button>
            </div>

        </form>
    </div>
</div>

@endsection