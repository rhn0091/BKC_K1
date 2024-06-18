@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{{ __('Web Bimbingan Konseling Terbaik') }}</h1>
                    <p>Selamat datang di aplikasi web bimbingan konseling terbaik. Di sini, Anda dapat menemukan sumber daya dan dukungan yang Anda perlukan.</p>
                    <a href="#" class="btn btn-primary mt-3">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="mt-5">
    <div class="container text-center">
        <p>&copy; 2024 Web Bimbingan Konseling. All Rights Reserved.</p>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </div>
</footer>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 1.25rem;
    }
    .card-body h1 {
        font-size: 1.75rem;
        color: #333;
    }
    .card-body p {
        font-size: 1rem;
        color: #666;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
    }
    footer {
        background-color: #f8f9fa;
        padding: 20px 0;
        border-top: 1px solid #e9ecef;
    }
    footer p {
        margin: 0;
    }
    footer a {
        color: #007bff;
        margin: 0 10px;
        text-decoration: none;
    }
    footer a:hover {
        text-decoration: underline;
    }
</style>
@endsection
