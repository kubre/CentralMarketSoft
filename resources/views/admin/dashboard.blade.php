@extends('layouts.app')

@section('content')
<div class="container panel">
    <div class="panel-heading">Dashboard</div>
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
                    <button type="submit" class="btn btn-default">Search</button>
                </span>
            </div>
        </form>
        </div>
        <hr>
        <p>
            <!-- No of users found -->
            @isset($found)
                No. of Registered users is {{ count($users) }}
                with mobile no. like <strong>{{ $mobile }}</strong>.
            @endisset
        </p>

        <!-- Go over users and display them -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Shop Name</th>
                    <th>Mobile no.</th>
                    <th>Action</th>
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
                            <button type="submit" class="btn btn-danger">Remove Approval</button>
                        </form>
                        @else
                        <form action="/admin/user/{{ $user->id }}/approve" method="post">
                            {{ @csrf_field() }}
                            {{ @method_field('PUT') }}
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        @endif
                    </td>
                @empty
                    @isset($found)
                    <td colpsan="4">
                        No users found with mobile no. {{ $mobile }}
                    </td>
                    @else
                    <td colpsan="4">
                        No users are registered
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