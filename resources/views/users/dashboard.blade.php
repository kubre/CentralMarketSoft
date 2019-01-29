@extends('layouts.app')

@section('nav')
    <li><a href="/dashboard">Dashboard</a></li>
    <li><a href="/farmer/create">Add Farmer</a></li>
    <li><a href="/license">Update License</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
