@extends('layouts.app')

@section('nav')
    <li><a href="/myshop"> {{ __('user.myshop') }} </a></li>
    <li><a href="/dashboard">{{ __('user.debtsearch') }}</a></li>
    <li><a href="/farmer/create"> {{ __('user.registerfarmer') }} </a></li>
    <li><a href="/debit/issue"> {{ __('user.issuedebt') }} </a></li>
    <li><a href="/license"> {{ __('user.license') }} {{ __('user.details') }} </a></li>
@endsection