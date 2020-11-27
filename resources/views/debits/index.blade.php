@extends('layouts.app')

@section('content')
<div class="container panel panel-default">
    <div class="panel-heading">
        <span class="pull-left" style="margin-right: 10px;"><a href="/dashboard" class="btn btn-info">Back</a></span>
        <h4>Search for farmer</h4> 
    </div>
    <div class="panel-body">

    <div class="alert alert-info">
    <p> <strong>Note: </strong>This form is to only issue new debit, to update older debit please use edit debit screen instead of create.</p>  
    </div>
        <form class="form-horizontal" action="/debits/search" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('search_val') ? ' has-error' : '' }}">
                <label for="search_val" class="col-md-4 control-label">Aadhar No./PAN/Light bill No.</label>

                <div class="col-md-6">
                    <input id="search_val" type="text" class="form-control" maxlength="12" minlength="12" name="search_val" value="{{ old('search_val') }}">

                    @if ($errors->has('search_val'))
                    <span class="help-block">
                        <strong>{{ $errors->first('search_val') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <hr>

            <div class="row">
                <button type="submit" class="btn btn-info col-md-6 col-md-offset-4">Search</button>
            </div>

        </form>
    </div>
</div>
@endsection