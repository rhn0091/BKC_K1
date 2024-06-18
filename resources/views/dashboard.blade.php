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
                        @if($konselors->isEmpty())
                            <p>Tidak ada konselor ditemukan.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Spesialis</th>
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
