<!-- resources/views/konselor.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('konselor.dashboard') }}">
                            Konselor Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Konseling
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Riwayat Konseling
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            Profil
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Konselor Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary">Action</button>
                        <button class="btn btn-sm btn-outline-secondary">Action</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #007bff; color: white;">
                            Selamat datang, {{ Auth::user()->name }}!
                        </div>
                        <div class="card-body">
                            <p>Anda login sebagai konselor.</p>
                            <p>Ini adalah halaman dashboard untuk konselor.</p>

                            <!-- Tambahkan link ke halaman janji -->
                            <a href="{{ route('appointments.index') }}" class="btn btn-success mt-3">Lihat Janji</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
