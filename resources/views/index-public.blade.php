@extends('layouts.template')

@section('styles')
    <style>
        .landing-space {
            height: calc(100vh - 76px);
            background: url('{{ asset('https://ts2.mm.bing.net/th?q=rumah%20sakit%20terbesar%20di%20jogja') }}') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            flex-direction: column;
            padding: 0 20px;
        }

        .landing-space h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .landing-space p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .login-button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 15px 30px;
            font-size: 1.25rem;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="landing-space">
        <div>
            <h1>WebGIS Persebaran Fasilitas Kesehatan Kota Yogyakarta</h1>
            <p>Kesehatan Anda Kebahagiaan Kami</p>
            @if (!Auth::check())
                <a href="{{ route('login') }}" class="login-button">Login</a>
            @else
                <a href="{{ route('dashboard') }}" class="login-button">Go to Dashboard</a>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Any additional scripts can go here
        console.log("Landing space script loaded.");
    </script>
@endsection
