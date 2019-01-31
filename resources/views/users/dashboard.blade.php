@extends('layouts.app')

@section('nav')
<li><a href="/dashboard">Search Debt.</a></li>
<li><a href="/farmer/create">Add Farmer</a></li>
<li><a href="/debit/create">Issue Debt.</a></li>
<li><a href="/license">License Details</a></li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search Debt.</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="form-horizontal" action="" method="post">
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">First Name</label>
                                <input class="col-md-8" type="text" id="first_name" name="first_name">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Last Name</label>
                                <input class="col-md-8" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Mobile</label>
                                <input class="col-md-8" type="text" name="mobile" id="mobile">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Date Of Birth</label>
                                <input class="col-md-8" style="padding: 6px 5px" type="date" name="dob" id="dob">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Aadhar</label>
                                <input class="col-md-8" type="text" name="aadhar" id="aadhar">
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-md-4" for="">Pan</label>
                                <input class="col-md-8" type="text" name="pan" id="pan">
                            </div>
                        </div>

                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label class="col-md-4" for="">Light Bill</label>
                                <input class="col-md-8" type="text" name="light_bill" id="light_bill">
                            </div>
                        </div>
                    </form>

                    <div>
                        <table class="table">
                            {{-- TODO: make live search --}}
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection