    @extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <title>Web Bimbingan Konseling</title>
</head>
<body>
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
                        <a href="{{ route('login') }}" class="btn btn-primary mt-3">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Web Bimbingan Konseling. All Rights Reserved.</p>
            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
        </div>
    </footer>
    @endsection

</body>
</html>
