@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"> {{ __('user.myshop') }} </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="debt-table">
                            <thead>
                                <tr>
                                    <th> {{ __('user.fullname') }} </th>
                                    <th> {{ __('forms.aadharno') }}</th>
                                    <th> {{ __('user.address') }} </th>
                                    <th> {{ __('user.amountissued') }} </th>
                                    <th> {{ __('user.issuedate') }} </th>
                                    <th> {{ __('user.remainingamount') }} </th>
                                    <th style="width: 300px"> {{ __('user.details') }} </th>
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
        $("#debt-table").DataTable({
        processing: true,
        serverSide: true,
        sScrollY: ($(window).height() - 400),
        ajax: '{!! route('myshop.getdata') !!}',
        columns: [
            { data: 'first_name', name: 'first_name' },
            { data: 'aadhar', name: 'aadhar' },
            { data: 'address', name: 'address' },
            { data: 'issue_amount', name: 'issue_amount' },
            { data: 'issue_date', name: 'issue_date' },
            { data: 'amount', name: 'amount'},
            { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endsection