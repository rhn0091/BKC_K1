@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p>Selamat datang, {{ Auth::user()->name }}!</p>

                        <h3>Daftar Konselor</h3>

                        <!-- Formulir Pencarian -->
                        <form method="GET" action="{{ route('dashboard') }}">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari konselor..." value="{{ request('search') }}">
                            </div>
                            <div class="form-group">
                                <select name="spesialisasi" class="form-control">
                                    <option value="">Semua Spesialisasi</option>
                                    @foreach($spesialisasis as $spesialisasi)
                                        <option value="{{ $spesialisasi }}" {{ request('spesialisasi') == $spesialisasi ? 'selected' : '' }}>
                                            {{ $spesialisasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                        <br>

                        @if($konselors->isEmpty())
                            <p>Tidak ada konselor ditemukan.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Spesialisasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($konselors as $konselor)
                                        <tr>
                                            <td>{{ $konselor->name }}</td>
                                            <td>{{ $konselor->email }}</td>
                                            <td>{{ $konselor->spesialisasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
