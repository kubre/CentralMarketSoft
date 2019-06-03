@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading">{{ __('user.issuedebt') }}</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="debt-table">
                            <thead>
                                <tr>
                                    <th> {{ __('user.fullname') }} </th>
                                    <th> {{ __('forms.mobile') }} </th>
                                    <th> {{ __('forms.aadharno') }} </th>
                                    <th> {{ __('user.address') }} </th>
                                    <th> {{ __('user.details') }} </th>
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
            ajax: '{!! route('farmers.getdata') !!}',
            columns: [
                { data: 'first_name', name: 'first_name' },
                { data: 'mobile', name: 'mobile' },
                { data: 'aadhar', name: 'aadhar' },
                { data: 'address', name: 'address'},
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endsection