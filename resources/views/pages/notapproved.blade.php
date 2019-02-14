@extends('layouts.app')

@section('content')
<div class="container panel">
    <div class="panel-heading">
        <h3>{{ __('user.usernotauthheading') }}</h3>
    </div>
    <div class="panel-body">
        <p>
         {{ __('messages.usernotauth') }}
        </p>
    </div>
</div>
@endsection