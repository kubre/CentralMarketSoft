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
                                </tr>
                            </thead>
                            <tbody>
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

            $("#first_name").on("keyup", function() {
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "first_name": $("#first_name").val()
                };
                fetchDebts(data);
            });

        });
    </script>
@endsection