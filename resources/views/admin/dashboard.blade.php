@extends('layouts.app')

@section('content')
<div class="container panel">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <form class="form-horizontal" action="" method="">
            <div class="input-group">
                <input class="form-control" name="search" id="search" type="text" placeholder="Search by Mobile">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default">Search</button>
                </span>
            </div>
        </form>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Shop Name</th>
                    <th>Mobile no.</th>
                    <th>Approved</th>
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
                    <td colpsan="4">
                        No users are registered
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection