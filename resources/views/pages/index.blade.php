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

    <div class="text-center">
    {{-- <a style="margin-top: 20px" class="btn btn-success" href="https://drive.google.com/file/d/1orBwiOZ0aEX0qXa-Ijh9x7ToAXzp0Sem/view?usp=sharing"> डॉनलोड मराठी टायपिंग सॉफ्टवेअर</a> --}}
    </div>
    <footer style="font-size: 1.2em;position: fixed;bottom: 0;width: 100%;height: 40px;text-align: center;background: #EEEEEA;line-height: 40px;border-top: 1px solid rgba(0,0,0,0.16);">
    Designed &amp; Developed by <a class="btn-link" href="https://kubre.in" target="_blank">Vaibhav Kubre</a>
    </footer>
@endsection