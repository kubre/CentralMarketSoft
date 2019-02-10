@extends('layouts.app')

@section('content')
<div class="container panel">
    <div class="panel-heading"> {{ __('forms.adminsection') }} </div>
    <div class="panel-body">

        <div class="row">
        <!-- Search Box -->
        <form class="form-horizontal col-md-6" action="/admin/user/search" method="post">
            {{ @csrf_field() }}
            <div class="input-group">
                <input class="form-control" name="mobile" id="mobile" type="text" 
                maxlength="10" value="{{ isset($mobile) ? $mobile : '' }}" 
                placeholder="Search by Mobile No.">

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">{{ __('forms.search') }}</button>
                </span>
            </div>
        </form>
        </div>
        <hr>
        <p>
            <!-- No of users found -->
            @isset($found)
                {{ __('forms.usernumber') }} {{ count($users) }}
                {{__('forms.withmobile') }} <strong>{{ $mobile }}</strong>.
            @endisset
        </p>

        <!-- Go over users and display them -->
        <table class="table">
            <thead>
                <tr>
                    <th>{{__('forms.name') }}</th>
                    <th>{{__('forms.shopname') }}</th>
                    <th>{{__('forms.mobile') }}</th>
                    <th>{{__('forms.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->shop->shop_name }} </td>
                    <td> {{ $user->mobile }} </td>
                    <td style="width: 200px">
                        @if($user->is_active)
                        <form action="/admin/user/{{ $user->id }}/disapprove" method="post">
                            {{ @csrf_field() }}
                            {{ @method_field('PUT') }}
                            <button type="submit" class="btn btn-danger">{{__('forms.removeapproval') }}</button>
                        </form>
                        @else
                        <form action="/admin/user/{{ $user->id }}/approve" method="post">
                            {{ @csrf_field() }}
                            {{ @method_field('PUT') }}
                            <button type="submit" class="btn btn-success">{{__('forms.approval') }}</button>
                        </form>
                        @endif
                    </td>
                @empty
                    @isset($found)
                    <td colpsan="4">
                        {{__('forms.nouserfound') }} {{ $mobile }}
                    </td>
                    @else
                    <td colpsan="4">
                        {{__('forms.nouserreg')}}
                    </td>
                    @endisset
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection