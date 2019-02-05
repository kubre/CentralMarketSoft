@extends('layouts.user')

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

                    <form id="debt-search-form" class="form-horizontal" action="javascript:void(0)" method="post">
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">First Name</label>
                                <input class="col-md-8 search" type="text" id="first_name" name="first_name">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Last Name</label>
                                <input class="col-md-8 search" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Mobile</label>
                                <input class="col-md-8 search" type="text" name="mobile" id="mobile">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Village</label>
                                <input class="col-md-8 search" type="text" name="village" id="village">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4">Aadhar</label>
                                <input class="col-md-8 search" type="text" name="aadhar" id="aadhar">
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-md-4" for="">PAN</label>
                                <input class="col-md-8 search" type="text" name="pan" id="pan">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="">
                        <strong>Search Results</strong>
                        <table class="table" id="debt-table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Aadhar/PAN</th>
                                    <th>Address</th>
                                    <th>Shop</th>
                                    <th>Amount</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">Type something above...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            
            function fetchDebts(data) {
                $.post("/debit/search", data , function(res) {
                    $("#debt-table tbody").html(res.tbody);
                });
            }

            $("#debt-search-form").on("keyup", "input.search",function() {
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "first_name": $("#first_name").val(),
                    "last_name": $("#last_name").val(),
                    "mobile": $("#mobile").val(),
                    "village": $("#village").val(),
                    "aadhar": $("#aadhar").val(),
                    "pan": $("#pan").val()
                };
                fetchDebts(data);
            });

        });
    </script>
@endsection