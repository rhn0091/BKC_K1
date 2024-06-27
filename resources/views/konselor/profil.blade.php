@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil Konselor') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($konselor->photo)
                                <img src="{{ asset('storage/photos/'.$konselor->photo) }}" class="img-thumbnail rounded mx-auto d-block" alt="Foto Profil Konselor">
                            @else
                                <img src="{{ asset('img/profile.png') }}" class="img-thumbnail rounded mx-auto d-block" alt="Default Profile Photo">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $konselor->name }}</h3>
                            <p>{{ $konselor->email }}</p>
                            <p>{{ $konselor->spesialis }}</p>
                            <!-- Tambahkan informasi lain tentang konselor sesuai kebutuhan -->
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">{{ __('Kembali ke Dashboard') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
