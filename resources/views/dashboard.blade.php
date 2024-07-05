<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: #007bff; color: white; font-size: 1.5rem;">
                    Selamat Datang, {{ Auth::user()->name }}!
                </div>

                <div class="card-body">
                    <h4>Daftar Konselor</h4>

                    <!-- Formulir Pencarian -->
                    <form method="GET" action="{{ route('dashboard') }}" class="mb-3">
                        <div class="form-row align-items-end">
                            <div class="col-md-5 mb-3">
                                <label for="search" class="sr-only">Cari konselor</label>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari konselor..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="spesialisasi" class="sr-only">Spesialis</label>
                                <select name="spesialisasi" id="spesialisasi" class="form-control">
                                    <option value="">Semua Spesialis</option>
                                    @foreach($spesialisasis as $spesialisasi)
                                        <option value="{{ $spesialisasi }}" {{ request('spesialisasi') == $spesialisasi ? 'selected' : '' }}>
                                            {{ $spesialisasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-block">Cari</button>
                            </div>
                        </div>
                    </form>

                    @if($konselors->isEmpty())
                        <div class="alert alert-info" role="alert">
                            Tidak ada konselor ditemukan.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Spesialis</th>
                                        <th>Profil</th> <!-- Ditambahkan tautan profil -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($konselors as $konselor)
                                        <tr>
                                            <td>{{ $konselor->name }}</td>
                                            <td>{{ $konselor->spesialis }}</td>
                                            <td><a href="{{ route('konselor.profile', $konselor->id) }}" class="btn btn-sm btn-primary">Lihat Profil</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- Tambahkan link ke halaman janji -->
                    <a href="{{ route('appointments.index') }}" class="btn btn-success mt-3">Lihat Janji</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
