@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('user.myshop') }}</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form id="debt-search-form" class="form-horizontal" action="javascript:void(0)" method="post">
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12">{{ __('forms.firstname') }}</label>
                                <input class="col-md-8 col-xs-12 search" type="text" id="first_name" name="first_name">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12"> {{ __('forms.lastname') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12"> {{ __('forms.middlename') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="middle_name" id="middle_name">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12"> {{ __('forms.taluka') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="taluka" id="taluka">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12"> {{ __('forms.mobile') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="mobile" id="mobile">
                            </div>
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12"> {{ __('forms.village') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="village" id="village">
                            </div>
                        </div>
                        <div class="row" style="margin: 10px auto;">
                            <div class="col-md-6 row">
                                <label for="" class="col-md-4 col-xs-12"> {{ __('forms.aadharno') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="aadhar" id="aadhar">
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-md-4 col-xs-12" for=""> {{ __('forms.panno') }} </label>
                                <input class="col-md-8 col-xs-12 search" type="text" name="pan" id="pan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-big">{{ __('forms.search') }}</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <strong> {{ __('user.searchresults') }} </strong>
                    <div class="table-responsive">
                        <table class="table" id="debt-table">
                            <thead>
                                <tr>
                                    <th> {{ __('user.fullname') }} </th>
                                    <th> {{ __('forms.aadharno') }}/{{ __('forms.panno') }} </th>
                                    <th> {{ __('user.address') }} </th>
                                    <th> {{ __('user.amountissued') }} </th>
                                    <th> {{ __('user.remainingamount') }} </th>
                                    <th> {{ __('user.details') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">{{ __('user.type') }}...</td>
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
                $.post("/myshop/debt/search", data , function(res) {
                    $("#debt-table tbody").html(res.tbody);
                });
            }

            $("#debt-search-form").on("submit", function(e) {
                e.preventDefault();
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "first_name": $("#first_name").val(),
                    "last_name": $("#last_name").val(),
                    "middle_name": $("#middle_name").val(),
                    "taluka": $("#taluka").val(),
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