@extends('layouts.app')

@section('content')
    <h1 class="text-center"> कार्यालय आणि दुकान विभाग </h1>
    @auth
        <div class="text-center">
            <a href="/dashboard" class="btn btn-primary" style="font-size: 24px;"> येथे क्लिक करा </a>
        </div>
    @else
        <h2 class="text-center"> लॉग इन करा </h2>
    @endauth
@endsection